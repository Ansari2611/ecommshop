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
    public function index(){
        $products=Product::paginate(6);
        return view('user.home',compact('products'));
    }

    public function addcart(Request $request,$id)
    {
        $user=auth()->user();
        $cart=new Cart();
        $product=Product::find($id);
        

        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->productname=$product->productname; 
        $cart->description=$product->description;
        $cart->price=$product->price;
        $cart->image=$product->image;
        $cart->quantity=$request->quantity;
        $cart->save();
        return redirect()->back();
    

    }
    public function showcart()
    {
        $user=auth()->user();
        $cart=Cart::where('email',$user->email,'id')->get();
        
        
        
        $count=Cart::where('email',$user->email)->count();
        
        return view('user.showcart',['cart'=>$cart,'count'=>$count]); 


    }


    public function updatecart(Request $request, $id)
    {
        $cartItem = Cart::find($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
    
        return redirect()->route('checkout');
    }


    public function deletecart($id){
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function checkout()
    {
        
        $cart=Cart::all();
        $amount = DB::table('wallets')->sum('Amount');
     
        return view('user.checkout',['cart'=>$cart,'amount'=>$amount]);
    }

    public function order(Request $request){

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
        $cart = Cart::all();
        foreach ($cart as $item) {
            $totalPrice += $item->price * $item->quantity;
        }
    
        // Get the user and their email
        $user = auth()->user();
        $email = $user->email;
    
        // Get the amount available in the user's wallet
        $amountInWallet = DB::table('wallets')->sum('Amount');
    
        // Check if the user has enough balance in their wallet
        if ($totalPrice > $amountInWallet) {
            return redirect()->back()->with('alert','Insufficient balance in wallet');
        }
    
        // Deduct the order amount from the user's wallet
        $updatedAmount = $amountInWallet - $totalPrice;
        DB::table('wallets')->update(['Amount' => $updatedAmount]);
    
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
            $orderItem->save();
        }
    
        // Clear the user's cart
        DB::table('carts')->where('email', $email)->delete();
    
        return redirect()->back()->with('message','Ordered Successfully');
    }
    
    public function contact()
    {
        return view('user.contact');
    }

    public function contactus(Request $request)
    {
        $contact=new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->message=$request->message;
        $contact->save();

        return redirect()->back()->with('message','Your Request Has Been Submitted Successfully');
    }

    public function aboutus()
    {
        return view('user.about');
    }

    public function totalprice(Request $request){
        $totalPrice = $request->totalPrice;
     session(['totalPrice' => $totalPrice]);
     return response()->json($totalPrice);

    }

    public function showwallet(){

        $amount = DB::table('wallets')->sum('Amount');

        return view('user.wallet',['amount'=>$amount]);
    }

    public function addwallet(Request $request)
    {
        $addwallet=new Wallet();
        $addwallet->Amount=$request->amount;
        $addwallet->save();

        return redirect()->back();
    }

    public function myorders()
    {

        $user=auth()->user();
        

      
        $myorders=OrderItem::all();

        return view('user.myorders',['myorders'=>$myorders]);
    }
    public function deleteorders($id)
    {
        
        $deleteorders=OrderItem::find($id);
        
        $deleteorders->delete();
 
        return redirect()->back()->with('message','Your ordered Has Been Cancelled');
    } 
}
