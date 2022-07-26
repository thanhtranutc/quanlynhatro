@extends('index')

@section('content')
<h1>{{__('Danh sách phòng trọ nợ tiền')}}</h1>
<div class="block-search">
</div>
<div>
  <table id="apartment">
    <tr>
      <th>Số phòng</th>
      <th>Tiền nợ</th>
      <th>Người thuê</th>
      <th>Tháng</th>
    </tr>
    @foreach($listRoom as $item)
    <tr>
      <td>{{$item->Apartmentroom['room_number']}}</td>
      <td>{{formatMoney($item->total_price-$item->total_paid)}}</td>
      <td>{{$item->Tenant['name']}}</td>
      <td>{{formatMonth($item->charge_date)}}</td>
    </tr>
    @endforeach
  </table>

</div>
@endsection