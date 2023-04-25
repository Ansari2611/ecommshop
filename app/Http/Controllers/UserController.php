<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('user.home', compact('products'));
    }

    public function addcart(Request $request, $id)
    {
        $user = auth()->user();
        $cart = new Cart();
        $product = Product::find($id);


        $cart->name = $user->name;
        $cart->email = $user->email;
        $cart->productname = $product->productname;
        $cart->description = $product->description;
        $cart->price = $product->price;
        $cart->image = $product->image;
        $cart->quantity = $request->quantity;
        $cart->user_id = Auth::user()->id;
        $cart->save();
        return redirect()->back();
    }
    public function showcart()
    {
        $user = auth()->user();
        $cart = Cart::where('email', $user->email)->get();



        $count = Cart::where('email', $user->email)->count();

        return view('user.showcart', ['cart' => $cart, 'count' => $count]);
    }


    public function updatecart(Request $request, $id)
    {
        $cartItem = Cart::find($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('checkout');
    }


    public function deletecart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function checkout()
    {
        $user_id = Auth::id(); // get the authenticated user's id
        $cart = Cart::where('user_id', $user_id)->get(); // get the user's cart items
        $showwallet = Wallet::where('user_id', $user_id)->sum('amount');
        return view('user.checkout', ['cart' => $cart, 'showwallet' => $showwallet]);
    }

    public function order(Request $request)
    {

        // Validate the form data
        $validate = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'address' => 'required',
            'zipcode' => 'required',
        ]);

        // Calculate the total price of the order
        $totalPrice = 0;
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->get();
        foreach ($cart as $item) {
            $totalPrice += $item->price * $item->quantity;
        }

        // Get the user and their email
        $user = auth()->user();
        $user_id = Auth::id();
        $email = $user->email;

        // Get the amount available in the user's wallet
        $amountInWallet = Wallet::where('user_id', $user_id)->sum('amount');

        // Check if the user has enough balance in their wallet
        if ($totalPrice > $amountInWallet) {
            return redirect()->back()->with('alert', 'Insufficient balance in wallet');
        }

        // Deduct the order amount from the user's wallet
        $updatedAmount = $amountInWallet - $totalPrice;
        $user_id = Auth::id();
        DB::table('wallets')->where('user_id', $user_id)->update(['Amount' => $updatedAmount]);

        // Create a new order
        $order = new Order();
        $order->name = $validate['name'];
        $order->email = $validate['email'];
        $order->phone = $validate['phone'];
        $order->address = $validate['address'];
        $order->zipcode = $validate['zipcode'];
        $order->totalprice = $totalPrice;
        $order->cash_on_delivery = true;
        $order->save();

        // Create order items for each item in the cart
        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->productname = $item->productname;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->price;
            $orderItem->description = $item->description;
            $orderItem->image = $item->image;
            $orderItem->user_id = Auth::user()->id;
            $orderItem->save();
        }

        // Clear the user's cart
        DB::table('carts')->where('email', $email)->delete();

        return redirect()->back()->with('message', 'Ordered Successfully');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function contactus(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('message', 'Your Request Has Been Submitted Successfully');
    }

    public function aboutus()
    {
        return view('user.about');
    }

    public function totalprice(Request $request)
    {
        $totalPrice = $request->totalPrice;
        session(['totalPrice' => $totalPrice]);
        return response()->json($totalPrice);
    }

    public function showwallet()
    {


        $user = Auth::user(); // get the authenticated user
        $wallet = Wallet::where('user_id', $user->id)->first(); // get the user's wallet record
        $showwallet = $wallet ? $wallet->amount : 0; // set $showwallet to the wallet amount or 0 if the wallet does not exist
        return view('user.wallet', ['showwallet' => $showwallet, 'user' => $user]);
    }

    public function addwallet(Request $request)
    {
        $user_id = Auth::id(); // get the authenticated user's id
        $wallet = Wallet::where('user_id', $user_id)->first(); // get the user's wallet record
        if (!$wallet) { // if the user does not have a wallet, create one
            $wallet = new Wallet;
            $wallet->user_id = $user_id;
        }
        $wallet->amount += $request->amount; // add the amount to the wallet
        $wallet->save();
        return redirect()->back();
    }

    public function myorders()
    {

        $user_id = Auth::id(); // get the authenticated user's id
        $myorders = OrderItem::where('user_id', $user_id)->get(); // get the user's order items
        return view('user.myorders', compact('myorders'));
    }
    public function deleteorders($id)
    {
        $cancelledOrder = OrderItem::find($id); // Retrieve order item from database
        $cancelledAmount = $cancelledOrder->price * $cancelledOrder->quantity; // Calculate amount to be added back
        $cancelledOrder->delete(); // Delete order item from database

        // Add cancelled amount back to user's wallet balance
        $user_id = Auth::id();
        $wallet = Wallet::where('user_id', $user_id)->firstOrFail();
        $wallet->amount += $cancelledAmount;
        $wallet->save();

        return redirect()->back()->with('message', 'Order cancelled successfully. Amount has been added back to your wallet.');
    }
}
