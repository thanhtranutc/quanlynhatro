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
  <canvas id="myChart" style="width: 900px !important; height:500px !important; margin: auto;" ></canvas>
</div>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
            label: '#Tiền trọ',
            data: <?= json_encode($totalPrice); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        },
        {
            label: '#Tiền nợ',
            data: <?= json_encode($totalDebt); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection