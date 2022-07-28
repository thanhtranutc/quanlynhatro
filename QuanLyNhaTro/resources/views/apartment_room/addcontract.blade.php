@extends('index')

@section('content')
<div>
    <h1>{{__('Thêm hợp đồng')}}</h1>
</div>
<div class="container">
    <form action="{{route('room.savecontract',$id)}}" method="post">
        @csrf
        <label for="fname">Mã phòng</label> 
        <input disabled class="input-custom" type="text" id="fname" value="{{$id}}" name="apartment_room_id">

        <label for="lname">Tên người thuê</label>
        <input class="input-custom" type="text" id="lname" name="name" placeholder="Nhập...">
        <label for="lname">Số điện thoại</label>
        <input class="input-custom" type="text" id="lname" name="phone" placeholder="Nhập...">
        <label for="lname">email</label>
        <input class="input-custom" type="text" id="lname" name="email" placeholder="Nhập...">
        <label for="lname">Thời gian bắt đầu</label>
        <input class="input-custom" type="date" id="lname" name="start" placeholder="Nhập...">
        <label for="lname">Thời gian kết thúc</label>
        <input class="input-custom" type="date" id="lname" name="end" placeholder="Nhập...">
        <input class="input-custom" type="submit" value="Xác nhận">
    </form>
</div>
@endsection