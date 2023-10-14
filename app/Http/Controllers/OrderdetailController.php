<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class OrderdetailController extends Controller
{
    public function viewDetail($id) {
        $order = Order::find($id);
        $detail = Order_detail::where('order_id', 'like' , '%'.$order->id.'%')->get();
        
        $detail_product = array();
        
        foreach($detail as $c){
            $name = $c->product->name;
            $price = $c->product->price;
            $qty = $c->qty;
            $detail_product[] = array($name, $price, $qty);
            array_push($detail_product, $name, $price, $qty);
        }
        return compact('detail_product');
        // return view('order/detail', compact('order', 'detail_product'));
        
    }
    
}