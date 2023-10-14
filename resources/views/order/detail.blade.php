@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง @stop {{-- หัวข้อ title html --}}
@section('content')
    <h1>ออเดอร์สินค้า</h1>
    <div class="container">
        <h1>ข้อมูลสินค้า</h1>
        <ul class="breadcrumb">
            {{-- <li><a href="{{ URL::to('product') }}">ข้อมูลสินค้า</a></li> --}}
            <li class="active">Detail of</li>
        </ul>

        


    @endsection
