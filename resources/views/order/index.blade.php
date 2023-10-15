@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง @stop {{-- หัวข้อ title html --}}
@section('content')
    <h1>ข้อมูลสินค้า</h1>
    <ul class="breadcrumb">
        <li class="active">รายการข้อมูลสั่งซื้อ</li>
    </ul>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>รายการข้อมูลสั่งซื้อ</strong>
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
<<<<<<< HEAD
                            <td> {{$o->id}} </td>
                            <td> {{$o->ref_id}} </td>
                            <td> {{$o->user->name}} </td>
                            <td> {{ $o->created_at->format("Y/m/d") }} </td>
                            <td class="bs-center"> <a href="{{url('/order/detail/'.$o->id)}}" class="btn btn-info">รายละเอียด</a> </td>
                            <td class="bs-center"> 
                                @if ($o->status == 2)
=======
                            <td> {{ $o->id }} </td>
                            <td> {{ $o->ref_id }} </td>
                            <td> {{ $o->user->name }} </td>
                            <td> {{ $o->created_at->format('Y/m/d') }} </td>
                            <td class="bs-center"> <a href="{{ url('/order/detail/' . $o->id) }}"
                                    class="btn btn-info">รายละเอียด</a> </td>
                            <td class="bs-center">
                                @if ($o->payment_status == 0)
>>>>>>> 6dfbaf37fe3dd203900262ba8d62bb4af1c74ccb
                                    <span class="label label-danger">ยังไม่ชำระเงิน</span>
                                @else
                                    <span class="label label-success">ชำระเงินแล้ว</span>
                                @endif

                                <label class="switch">
                                    @if ($o->payment_status == 0)
                                        <input type="checkbox" id="toggleSwitch" checked>
                                        <span class="slider" id="result"></span>
                                    @else
                                        <input type="checkbox" id="toggleSwitch">
                                        <span class="slider" id="result"></span>
                                    @endif
                                </label>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <script>
        const toggleSwitch = document.getElementById('toggleSwitch');
        toggleSwitch.addEventListener('click', () => {
            if (toggleSwitch.checked) {
                console.log('Toggle ' + toggleSwitch.checked);
            } else {
                console.log('Toggle ' + toggleSwitch.checked);
            }
        });
    </script>
@endsection
