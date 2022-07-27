@extends('index')

@section('content')
<h1>{{__('Danh sách phòng trọ')}}</h1>
<div class="block-search">
  <form action="{{route('room.search')}}" method="post">
    @csrf
    <label>Tên tòa nhà: </label></label><input name="apartment" type="text">
    <label>Số phòng: </label><input name="room_number" type="text">
    <input type="submit" value="Tìm kiếm">
  </form>
  <a class="btn-form" href="{{route('room.add')}}">{{__('Thêm')}}</a>
</div>
<div>
  <table id="apartment">
    <tr>
      <th>Số phòng</th>
      <th>Giá thuê</th>
      <th>Số người ở</th>
      <th>Toà nhà</th>
      <th>Ảnh</th>
      <th></th>
    </tr>
    @foreach($listRoom as $item)
    <tr>
      <td>{{$item->room_number}}</td>
      <td>{{formatMoney($item->price)}} .VND</td>
      <td>{{$item->tenant_number}}</td>
      <td>{{$item->apartment['name']}}</td>
      <td>
        <div class="content-img">
          <img width="50px;" height="50px;" src="{{URL('/img/apartment_room/'.$item->room_image)}}">
        </div>
      </td>
      <td>
        <div class="container-btn">
          <a class="btn-form" href="{{route('room.view',$item->id)}}">{{__('Xem')}}</a>
          <a class="btn-form" href="{{route('room.edit',$item->id)}}">{{__('Sửa')}}</a>
          <a class="btn-form delete" onclick="return confirm('Bạn có muốn xóa không')" href="{{route('room.delete',$item->id)}}">{{__('Xóa')}}</a>
        </div>
      </td>
    </tr>
    @endforeach
  </table>

</div>
<div class="block-pagination" style="width: 21%;float: right;padding-top: 20px;">
  {{ $listRoom->links() }}
</div>
@endsection