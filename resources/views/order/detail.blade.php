@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง @stop {{-- หัวข้อ title html --}}
@section('content')
    <div class="container">
        <h1>ข้อมูลสินค้า</h1>
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('order') }}">รายการข้อมูลสั่งซื้อ</a></li>
            <li class="active">Detail of</li>
        </ul>

        <div class="panel-body">
            <table class="table table-bordered bs-table">
                <thead>
                    <tr>
                        <th>หัวข้อ</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>

                <tr>
                    <td>เลขที่ใบสั่งซื้อ</td>
                    <td>{{ $order->ref_id }} </td>
                </tr>

                <tr>
                    <td>ชื่อลูกค้า</td>
                    <td>{{ $order->user->name }} </td>
                </tr>

                <tr>
                    <td>วันที่สั่งซื้อสินค้า</td>
                    <td>{{ $order->created_at->format('Y/m/d') }} </td>
                </tr>

                <tr>
                    <td>สถานะการชำระเงิน</td>
                    <td>
                        @if ($order->payment_status == 0)
                            <span class="label label-danger">ยังไม่ชำระเงิน</span>
                        @else
                            <span class="label label-success">ชำระเงินแล้ว</span>
                        @endif
                    </td>

            </table>
            <br>

            <table class="table table-bordered bs-table">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($detail_product as $dp)
                        <tr>
                            <td>{{ $dp->id }}</td>
                            <td>{{ $dp->product->name }}</td>
                            <td>{{ $dp->price }}</td>
                            <td>{{ $dp->qty }}</td>
                            <td>{{ $dp->total }}</td>
                        </tr>
                        
                    @endforeach


                </tbody>

            </table>







        @endsection
