@extends('index')

@section('content')
<h1>{{__('Danh sách phụ phí')}}</h1>
<div class="block-search">
    <form action="" method="post">
        @csrf
        <label>Tên: </label></label><input name="name" type="text">
        <label>Địa chỉ: </label><input name="address" type="text">
        <input type="submit" value="Tìm kiếm">
    </form>
    <a class="btn-form" href="{{route('admin.monthlycost.add')}}">{{__('Thêm')}}</a>
</div>
<div>
    <table id="apartment">
        <tr>
            <th>STT</th>
            <th>Loại phụ phí</th>
            <th></th>
        </tr>
        @foreach($listMonthlyCost as $key => $item)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->name}}</td>
            <td>
                <div class="container-btn">
                    <a class="btn-form" href="{{route('admin.monthlycost.edit',$item->id)}}">{{__('Sửa')}}</a>
                    <a class="btn-form delete" onclick="return confirm('Bạn có muốn xóa không')" href="{{route('admin.monthlycost.delete',$item->id)}}">{{__('Xóa')}}</a>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection