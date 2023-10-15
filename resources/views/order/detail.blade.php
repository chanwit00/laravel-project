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
                </tr>

                <tr>
                    <td>ชื่อลูกค้า</td>
                </tr>

                <tr>
                    <td>วันที่สั่งซื้อสินค้า</td>
                </tr>

                <tr>
                    <td>สถานะการชำระเงิน</td>
                    

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
                   


                </tbody>

            </table>



@endsection
