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
            <table class="table table-bordered bs-table">
                <thead>
                    <tr>
                        <th>OrderID</th>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ชื่อลูกค้า</th>
                        <th>วันที่สั่งซื้อสินค้า</th>
                        <th>รายละเอียด</th>
                        <th>สถานะการชำระเงิน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $o)
                        <tr>
                            <td> {{$o->id}} </td>
                            <td> {{$o->ref_id}} </td>
                            <td> {{$o->user->name}} </td>
                            <td> {{ $o->created_at->format("Y/m/d") }} </td>
                            <td class="bs-center"> <a href="{{url('/order/detail/'.$o->id)}}" class="btn btn-info">รายละเอียด</a> </td>
                            <td class="bs-center"> 
                                @if ($o->status == 2)
                                    <span class="label label-danger">ยังไม่ชำระเงิน</span>
                                @else
                                    <span class="label label-success">ชำระเงินแล้ว</span>
                                @endif
                            </td>
                        </tr>
                    
                    @endforeach

                </tbody>
            </table>
@endsection