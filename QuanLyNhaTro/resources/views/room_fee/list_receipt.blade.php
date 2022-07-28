@extends('index')

@section('content')
<h1>{{__('Danh sách hóa đơn')}}</h1>
<a class="btn-form" href="{{route('receipt.add',$listReceipt[0]->id)}}">{{__('Thêm')}}</a>
<div>
  <table id="apartment">
    <tr>
      <th>Số phòng</th>
      <th>Người thuê</th>
      <th>Số nước</th>
      <th>Số điện</th>
      <th>Tháng</th>
      <th>Tổng tiền</th>
      <th>Đã trả</th>
      <th></th>                                                                              
    </tr>
    @foreach($listReceipt as $item)                                    
    <tr>
      <td>{{$item->apartment_room_id}}</td>                      
      <td>{{$item->tenant['name']}}</td>            
      <td>{{$item->water_number}}</td>             
      <td>{{$item->electricity_number}}</td>          
      <td>{{formatMonth($item->charge_date)}}</td>                               
      <td>{{$item->total_price}}</td>               
      <td>{{$item->total_paid}}</td>                                                       
      <td>
        <div class="container-btn">                                                       
          <a class="btn-form" href="{{route('receipt.list',$item->id)}}">{{__('Sửa')}}</a>                                            
        </div>                     
      </td>                           
    </tr>                             
    @endforeach                        
  </table>                              
                                        
</div>
@endsection