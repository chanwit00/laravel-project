<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index () {
        $orders = Order::all();
        return view('order/index', compact('orders'));
    }

    public function insertOrder(){
        $orders = new Order();
        $orders->ref_id = Session::get('po_no');
        $orders->user_id = Auth::user()->id;
        $orders->status = 1;
        $orders->save();

        return redirect('order/insertDetail');
        // return redirect('cart/finish');

    }
  

    public function insertDetail() {
        $cart_items = Session::get('cart_items');
        // $orders = Order::where('ref_id', 'like' , Session::get('po_no'))->get();
        $orders = Order::where('ref_id', 'like' ,Session::get('po_no'))->get();
        $orders_id = $orders[0]->id;
        foreach($cart_items as $c){
            $orders_detail = new Order_Detail();
            $orders_detail->product_id = $c['id'];
            $orders_detail->order_id = $orders_id;
            $orders_detail->qty = $c['qty'];
            $orders_detail->save();
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
