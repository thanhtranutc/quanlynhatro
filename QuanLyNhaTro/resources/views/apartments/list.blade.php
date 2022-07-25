<style>
    #apartment {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#apartment td,
#apartment th {
  border: 1px solid #ddd;
  padding: 8px;
}

#apartment tr:nth-child(even) {
  background-color: #f2f2f2;
}

#apartment tr:hover {
  background-color: #ddd;
}

#apartment th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

</style>
@extends('index')

@section('content')
<h1>{{__('Danh sách tòa nhà')}}</h1>
<table id="apartment">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Địa chỉ</th>
        <th>Ảnh</th>
        <th></th>
    </tr>
    @foreach($listApartment as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->address}}</td>
        <td><img src=""></td>
        <td>
            <a href="">{{__('Thêm')}}</a>
            <a href="">{{__('Sửa')}}</a>
            <a href="">{{__('Xóa')}}</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection