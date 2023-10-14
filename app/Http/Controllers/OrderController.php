<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_detail;
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

    
}
