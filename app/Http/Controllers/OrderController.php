<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('order/index', compact('orders'));
    }

    public function insertOrder()
    {
        $orders = new Order();
        $orders->ref_id = Session::get('po_no');
        $orders->user_id = Auth::user()->id;
        $orders->status = 1;
        $orders->save();

        return redirect('order/insertDetail');
        // return redirect('cart/finish');

    }

    public function insertDetail()
    {
        $cart_items = Session::get('cart_items');
        // $orders = Order::where('ref_id', 'like' , Session::get('po_no'))->get();
        $orders = Order::where('ref_id', 'like', Session::get('po_no'))->get();
        $orders_id = $orders[0]->id;
        foreach ($cart_items as $c) {
            $orders_detail = new Order_Detail();
            $orders_detail->product_id = $c['id'];
            $orders_detail->order_id = $orders_id;
            $orders_detail->qty = $c['qty'];
            $orders_detail->save();
        }

        return redirect('cart/finish');
    }

    public function reportOrder($ref_id)
    {
        $order = Order::where('ref_id', 'like', '%' . $ref_id . '%')->first();
        $order->user;
        $cust_name = $order->user->name;
        $cust_email = $order->user->email;
        $po_no = $ref_id;
        $po_date = $order->created_at->format("Y-m-d H:i:s");
        $total_amount = 0;
        $cart_items = array();

        $details = Order_detail::where('order_id', 'like', '%' . $order->id . '%')->get();
        foreach ($details as $d) {
            $cart_items[$d->product->id] = array(
                "id" => $d->product->id,
                "code" => $d->product->code,
                "name" => $d->product->name,
                "price" => $d->product->price,
                "image_url" => $d->product->image_url,
                "qty" => $d->qty

            );
            $total_amount += $d->product->price * $d->qty;
        }


        $html_output = view(
            'cart/complete',
            compact(
                'cart_items',
                'cust_name',
                'cust_email',
                'po_no',
                'po_date',
                'total_amount'
            )
        )->render();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->debug = true;
        $mpdf->WriteHTML($html_output);
        $mpdf->Output('output.pdf', 'I');
        return $resp->withHeader("Content-type", "application/pdf");
    }

}