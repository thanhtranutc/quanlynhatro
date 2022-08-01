@extends('index')

@section('content')
<div>
    <h1>{{__('Thêm tòa nhà')}}</h1>
</div>
<div class="container">
    <form action="{{route('event.addapartment')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="fname">Tên tòa nhà</label>
        @error('name')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="text" id="fname" name="name" placeholder="Nhập tên">

        <label for="lname">Địa chỉ tòa nhà</label>
        @error('address')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input class="input-custom" type="text" id="lname" name="address" placeholder="Nhập đỉa chỉ">

        <label>Ảnh</label><br>
        <input class="input-custom" name="image" type="file" onchange="preview()">
        <br>
        <img id="frame" src="" width="100px" height="100px" /><br>
        <input class="input-custom" type="submit" value="Submit">
    </form>
</div>
@endsection