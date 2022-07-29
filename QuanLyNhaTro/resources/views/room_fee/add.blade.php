@extends('index')

@section('content')
<div>
    <h1>{{__('Thêm hóa đơn')}}</h1>
</div>
<div class="container">
    @if($errors->any())
    <p style="color: red;">{{$errors->first()}}</p>
    @endif
    <form action="{{route('receipt.save',$id)}}" method="post">
        @csrf
        <label for="fname">Phòng</label>
        <input class="input-custom" type="text" disabled value="{{$id}}" id="fname" name="apartment_room_id" placeholder="Nhập tên">
        <label for="lname">Số điện</label>
        @error('electricity_number')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="text" id="lname" name="electricity_number" placeholder="Nhập...">
        <label for="lname">Số nước</label>
        @error('water_number')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="text" id="lname" name="water_number" placeholder="Nhập...">
        <label for="lname">Tổng tiền</label>
        @error('total')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="text" id="lname" name="total" placeholder="Nhập...">
        <label for="lname">Số tiền đã trả</label>
        @error('total_price')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="text" id="lname" name="total_price" placeholder="Nhập...">
        <label for="lname">Ngày thanh toán</label>
        @error('charge_date')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="date" id="lname" name="charge_date" placeholder="Nhập...">
        <input class="input-custom" type="submit" value="Submit">
    </form>
</div>
@endsection