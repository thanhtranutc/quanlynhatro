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
          <a class="btn-form" href="{{route('receipt.list',$item->id)}}">{{__('Xem')}}</a>
        </div>
      </td>
    </tr>
    @endforeach
  </table>

</div>
@endsection