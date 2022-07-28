@extends('index')

@section('content')
<div>
    <h1>{{__('Sửa tòa nhà')}}</h1>
</div>
<div class="container">
    <form action="{{URL::to('/update-apartment'.$apartment->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="fname">Tên tòa nhà</label>
        @error('name')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input value="{{$apartment->name}}" class="input-custom" type="text" id="fname" name="name" placeholder="Nhập tên">

        <label for="lname">Địa chỉ tòa nhà</label>
        @error('address')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input value="{{$apartment->address}}" class="input-custom" type="text" id="lname" name="address" placeholder="Nhập đỉa chỉ">

        <label>Ảnh</label><br>
        <input class="input-custom" value="{{$apartment->image}}" name="image" type="file" onchange="preview()">
        <br>
        <img id="frame" src="{{URL('/img/apartment/'.$apartment->image)}}" width="100px" height="100px" /><br>
        <input class="input-custom" type="submit" value="Submit">
    </form>
</div>
@endsection