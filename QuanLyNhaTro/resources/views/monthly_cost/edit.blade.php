@extends('index')

@section('content')
<div>
    <h1>{{__('Thêm loại phụ phí')}}</h1>
</div>
<div class="container">
    <form action="{{route('admin.monthlycost.update',$monthlyCost->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="lname">Mã loại</label>
        <input class="input-custom" type="text" disabled id="fname" value="{{$monthlyCost->id}}"  placeholder="Nhập...">
        <label for="lname">Loại phụ phí</label>
        <input class="input-custom" type="text" id="fname" value="{{$monthlyCost->name}}" name="name" placeholder="Nhập...">
        <input class="input-custom" type="submit" value="Sửa">
    </form>
</div>
@endsection