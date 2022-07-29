@extends('index')

@section('content')
<div>
    <h1>{{__('Sửa hóa đơn')}}</h1>
</div>
<div class="container">
    <form action="{{route('update.receipt',$receiptCurrent->id)}}" method="post">
        @csrf
        <label for="fname">Phòng</label>
        <input class="input-custom" type="text" disabled value="{{$receiptCurrent->apartment_room_id}}" id="fname" name="apartment_room_id" placeholder="Nhập tên">
        <label for="lname">Số điện</label>
        @error('electricity_number')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="text" id="lname" name="electricity_number" value="{{$receiptCurrent->electricity_number}}" placeholder="Nhập...">
        <label for="lname">Số nước</label>
        @error('water_number')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="text" id="lname" value="{{$receiptCurrent->water_number}}" name="water_number" placeholder="Nhập...">
        <label for="lname">Tổng tiền</label>
        @error('total')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror 
        <input class="input-custom" type="text" id="lname" value="{{$receiptCurrent->total_price}}" name="total" placeholder="Nhập...">
        <label for="lname">Số tiền đã trả</label>
        @error('total_price')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="text" id="lname" value="{{$receiptCurrent->total_paid}}" name="total_price" placeholder="Nhập...">
        <label for="lname">Ngày thanh toán</label>
        <input class="input-custom" disabled type="text" id="lname" value="{{$receiptCurrent->charge_date}}" name="charge_date" placeholder="Nhập...">
        <input class="input-custom" type="submit" value="Submit">
    </form>
</div>
@endsection