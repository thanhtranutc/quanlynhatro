@extends('index')

@section('content')
<h1>{{__('Danh sách tòa nhà')}}</h1>
<div class="block-search">
  <form action="{{route('apartment.search')}}" method="post">
    @csrf
    <label>Tên: </label></label><input name="name" type="text">
    <label>Địa chỉ: </label><input name="address" type="text">
    <input type="submit" value="Tìm kiếm">
  </form>
</div>
<div>
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
      <td>
        <div class="content-img">
          <img width="50px;" height="50px;" src="{{URL('/img/apartment/'.$item->image)}}">
        </div>
      </td>
      <td>
        <div class="container-btn">
          <a class="btn-form" href="{{route('apartment.add')}}">{{__('Thêm')}}</a>
          <a class="btn-form" href="{{route('apartment.edit',$item->id)}}">{{__('Sửa')}}</a>
          <a class="btn-form delete" onclick="return confirm('Bạn có muốn xóa không')" href="{{route('apartment.delete',$item->id)}}">{{__('Xóa')}}</a>
        </div>
      </td>
    </tr>
    @endforeach
  </table>

</div>
<div class="block-pagination" style="width: 21%;float: right;padding-top: 20px;">
  {{ $listApartment->links() }}
</div>
@endsection