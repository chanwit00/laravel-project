@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง @stop {{-- หัวข้อ title html --}}
@section('content')
<h1>ออเดอร์สินค้า</h1>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>รายการออเดอร์</strong>
            </div>
        </div>
        <div class="panel-body">
                {{ csrf_field() }}
             
            </form>
            <br>
            <table class="table table-bordered bs_table">
                <thead>
                    <tr>
                        <th>OrderID</th>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ชื่อลูกค้า</th>
                        <th>วันที่สั่งซื้อ</th>
                        <th>รายละเอียด</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                        <td>id</td>
                        <td>order_id</td>
                        <td>customer_id</td>
                        <td>order_date</td>
                        <td>detail</td>
                        <td>status</td>
                     </tr>

                </tbody>
            </table>
@endsection