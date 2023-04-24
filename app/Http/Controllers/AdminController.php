<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function products()
    {
        
        return view('admin.addproducts');
    }

    public function addproducts(Request $request){
        $products=new Product();
        $products->productname=$request->productname;
        $products->price=$request->price;
        $products->description=$request->description;
        $products->quantity=$request->quantity;
        
        if($request->hasFile('image')){
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $image->move('productimages',$filename);
            $products->image=$filename;
        }
        $products->save();

        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function showproducts()
    {
        $data=Product::all();
        return view('admin.showproducts',compact('data'));
    }

    public function editproducts($id)
    {
        $data=Product::find($id);
        return view('admin.updateproducts',compact('data'));
    }

    public function updateproducts(Request $request ,$id)
    {
        $data=Product::find($id);
        $data->productname=$request->productname;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->quantity=$request->quantity;
        
        if($request->hasFile('image')){
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $image->move('productimages',$filename);
            $data->image=$filename;
        }
        $data->save();
        return redirect('/showproducts');
    }

    public function deleteproducts($id)
    {
        $data=Product::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function showorder()
    {
        $order=Order::all();

        $orderitem=OrderItem::all();
        
        return view('admin.order',["order"=>$order, "orderitem"=>$orderitem]);
        
    }
    public function updatestatus($id)
    {
        $order=OrderItem::find($id);
        $order->status='Delivered';
        $order->save();
        return redirect()->back();
    }
    
    public function contactmessage()
    {
        $contact=Contact::all();
        return view('admin.contactmessage',compact('contact'));
    }
    
}