@extends('index')

@section('content')
<h1>{{__('Danh sách user')}}</h1>
<div class="block-search">
  <form action="" method="post">
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
      <th>Email</th>
      <th>Số lượng tòa nhà</th>
      <th>Số lượng phòng trọ</th>
      <th></th>
    </tr>
    @foreach($listUser as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->apartment->count()}}</td>
      <td>{{$item->room->count()}}</td>
      <td>
        <div class="container-btn">
          <a class="btn-form" href="">{{__('Xem')}}</a>
        </div>
      </td>
    </tr>
    @endforeach
  </table>

</div>
<div class="block-pagination" style="width: 21%;float: right;padding-top: 20px;">
  {{ $listUser->links() }}
</div>
@endsection