<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function insertOrder(){
        $order = new Order();
        $order->ref_id = Session::get('po_no');
        $order->user_id = Auth::user()->id;
        $order->status = 1;
        $order->save();

        return redirect('order/insertDetail');
        // return redirect('cart/finish');

    }
    public function viewOrder(){
        $order = Order::all();

        return view('order/order',compact('order'));
    }

    public function insertDetail() {
        $cart_items = Session::get('cart_items');
        // $order = Order::where('ref_id', 'like' , Session::get('po_no'))->get();
        $order = Order::where('ref_id', 'like' ,Session::get('po_no'))->get();
        $order_id = $order[0]->id;
        foreach($cart_items as $c){
            $order_detail = new Order_Detail();
            $order_detail->product_id = $c['id'];
            $order_detail->order_id = $order_id;
            $order_detail->qty = $c['qty'];
            $order_detail->save();
        }

        return redirect('cart/finish');
    }

    public function viewDetail($id) {
        $order = Order::find($id);
        $product = Product::find($id);
        $detail_order = array(
            'ref' => $order->ref_id,
            'user' => $order->user->name,
            'date'  => $order->created_at,
            'email' => $order->user->email, 
            'status'  => $order->status,
        );
        
        $detail = Order_detail::where('order_id', 'like' , '%'.$order->id.'%')->get();
        
        $detail_product = array();
        
        foreach($detail as $c){
            $name = $c->product->name;
            $price = $c->product->price;
            $qty = $c->qty;
            array_push($detail_product, $name, $price, $qty);
        }

        return compact('detail_product');
    }
    
}