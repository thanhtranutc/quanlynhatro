@extends('index')

@section('content')
<div>
    <h1>{{__('Thêm hóa đơn')}}</h1>
</div>
<div class="container">
    <form action="{{URL::to('/save-apartment')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="fname">Phòng</label>
        <input class="input-custom" type="text" disabled value="{{$id}}" id="fname" name="apartment_room_id" placeholder="Nhập tên">

        <label for="lname">Số điện</label>
        <input class="input-custom" type="text" id="lname" name="electricity_number" placeholder="Nhập...">
        <label for="lname">Số nước</label>
        <input class="input-custom" type="text" id="lname" name="water_number" placeholder="Nhập...">
        <label for="lname">Tổng tiền</label>
        <input class="input-custom" type="text" id="lname" name="water_number" placeholder="Nhập...">
        <label for="lname">Số tiền đã trả</label>
        <input class="input-custom" type="text" id="lname" name="water_number" placeholder="Nhập...">
        <label for="lname">Ngày thanh toán</label>
        <input class="input-custom" type="date" id="lname" name="water_number" placeholder="Nhập...">
        <input class="input-custom" type="submit" value="Submit">
    </form>
</div>
@endsection