<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_detail;
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

    
}