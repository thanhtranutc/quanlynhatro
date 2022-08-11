@extends('index')

@section('content')
<h1>{{__('Biểu đồ thống kê')}}</h1>
<div class="block-search">
</div>
<div>
  <canvas id="chartStatistic" style="width: 900px !important; height:500px !important; margin: auto;"></canvas>
</div>
<script src="js/extend2.js"></script>
@endsection


