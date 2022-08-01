@extends('index')

@section('content')
<div>
    <h1>{{__('Thêm phòng trọ')}}</h1>
</div>
<div class="container">
    <form action="{{route('event.room')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="fname">Số phòng</label>
        @error('room_number')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="text" id="fname" name="room_number" placeholder="Nhập...">

        <label for="lname">Giá thuê</label>
        <input class="input-custom" type="text" id="lname" name="price" placeholder="Nhập...">
        <label for="lname">Số người thuê</label>
        <input class="input-custom" type="text" id="lname" name="number_tenant" placeholder="Nhập...">
        <label for="lname">Tòa nhà</label>
        <select class="input-custom" name="apartment">
            @foreach($listApartment as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select><br>
        <label>Ảnh</label><br>
        <input class="input-custom" name="image" type="file" onchange="preview()">
        <br>
        <img id="frame" src="" width="100px" height="100px" /><br>
        <input class="input-custom" type="submit" value="Submit">
    </form>
</div>
@endsection