@extends('index')

@section('content')
<div>
    <h1>{{__('Thêm loại phụ phí')}}</h1>
</div>
<div class="container">
    <form action="{{route('admin.monthlycost.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="lname">Loại phụ phí</label>
        <input class="input-custom" type="text" id="fname" name="name" placeholder="Nhập...">
        <input class="input-custom" type="submit" value="Thêm">
    </form>
</div>
@endsection