@extends('index')

@section('content')
<div>
    <h1>{{__('Thêm hợp đồng')}}</h1>
</div>
<div class="container">
    <form action="{{route('room.savecontract',$id)}}" method="post">
        @csrf
        <label for="fname">Mã phòng</label>
        <input disabled class="input-custom" type="text" id="fname" value="{{$id}}" name="apartment_room_id">
        <div id="container-btn">
            <button id="hide" onclick="addform()" class="btn-add">Người thuê mới</button>
        </div><br>
        <label for="lname">Giá thuê</label>
        <input class="input-custom" type="text" id="lname" name="price" placeholder="Nhập...">
        <label for="lname">Cách thức trả tiền điện</label>
        <select class="input-custom" name="electricity_pay_type">
            <option value="1">Trả theo đầu người</option>
            <option value="2">Trả theo phòng</option>
            <option value="3">Trả theo số điện sử dụng</option>
        </select><br>
        <label for="lname">Giá điện</label>
        <input class="input-custom" type="text" id="lname" name="price_water" placeholder="Nhập...">
        <label for="lname">Giá nước</label>
        <input class="input-custom" type="text" id="lname" name="price_electricity" placeholder="Nhập...">
        <label for="lname">Cách thức trả tiền nước</label>
        <select class="input-custom" name="water_pay_type">
            <option value="1">Trả theo đầu người</option>
            <option value="2">Trả theo phòng</option>
            <option value="3">Trả theo số nước sử dụng</option>
        </select><br>
        <label for="lname">Thời gian bắt đầu</label>
        <input class="input-custom" type="date" id="lname" name="start" placeholder="Nhập...">
        <label for="lname">Thời gian kết thúc</label>
        <input class="input-custom" type="date" id="lname" name="end" placeholder="Nhập...">
        <label for="lname">Ghi chú</label>
        <input class="input-custom" type="text" id="lname" name="note" placeholder="Nhập...">
        <div id="show">
            <label for="lname">Tên người thuê</label>
            <input class="input-custom" type="text" id="lname" name="name" placeholder="Nhập...">
            <label for="lname">Số điện thoại</label>
            <input class="input-custom" type="text" id="lname" name="phone" placeholder="Nhập...">
            <label for="lname">email</label>
            <input class="input-custom" type="text" id="lname" name="email" placeholder="Nhập...">
        </div>
        <div id="drop-down" name="drop-down">
            <label for="travel">Tiền phụ phí</label>
            <select id="travel" onChange=showHide() name="option_monthly_cost">
                <option value="1">Có</option>
                <option value="0" selected>Không</option>
            </select>
            <div name="hidden-panel" style="display:none;" id="hidden-panel">
                <label for="price">Loại phụ phí: </label>
                <select name="monthly_cost_type">
                    @foreach($listMonthlyCost as $monthlycost)
                    <option value="{{$monthlycost->id}}">{{$monthlycost->name}}</option>
                    @endforeach
                </select>
                <label for="price">Phương thức trả tiền: </label>
                <select name="monthly_cost_pay_type">
                    <option value="1">Trả theo đầu người</option>
                    <option value="0" selected>Trả theo phòng</option>
                </select>
                <label for="price">Nhập số tiền: </label>
                <input type="text" id="price" name="price_monthly_cost" />
            </div>
        </div>

        <input class="input-custom" type="submit" value="Xác nhận">
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#hide").click(function() {
            console.log('adasd');
        });
    });

    function showHide() {
        let travelhistory = document.getElementById('travel')
        if (travelhistory.value == 1) {
            document.getElementById('hidden-panel').style.display = 'block'
        } else {
            document.getElementById('hidden-panel').style.display = 'none'
        }
    }
</script>
@endsection