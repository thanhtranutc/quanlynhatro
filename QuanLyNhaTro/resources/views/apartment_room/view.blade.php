@extends('index')

@section('content')
<h2>{{__('Thông tin người thuê phòng')}}</h2>
<a class="btn-form" href="{{route('room.addcontract',$id)}}" <?php if (isset($tenantCurrent)) echo "hidden"; ?>>{{__('Thêm hợp đồng mới')}}</a>
<div class="container">
    <?php if (isset($tenantCurrent)) { ?>
        <div style="text-align:center">
            <h2>{{__('Thông tin khách hàng')}}</h2>
        </div>
        <div class="row">
            <div class="column">
                <img src="img/img_avatar2.png" style="width:100%">
            </div>
            <div class="column">
                <form action="/action_page.php">
                    <label for="fname">Họ và tên</label>
                    <input class="input-custom" type="text" id="fname" value="{{$tenantCurrent->name}}" name="name" placeholder="Your name..">
                    <label for="lname">Số điện thoại</label>
                    <input class="input-custom" type="text" id="lname" value="{{$tenantCurrent->phone}}" name="phone" placeholder="Your phone..">
                    <label for="country">E-mail</label>
                    <input class="input-custom" type="text" id="lname" value="{{$tenantCurrent->email}}" name="email" placeholder="Your E-mail..">
                    <label for="country">CMND</label>
                    <input class="input-custom" type="text" id="lname" value="{{$tenantCurrent->identity_card_number}}" name="identity_card" placeholder="Your edentity card number..">
                    <input style="width:20% !important ;" class="input-custom" type="submit" value="Cập nhật">
                </form>
            </div>
        </div>
    <?php } else { ?>
        <div style="text-align:center">
            <p>{{__('Phòng này hiện tại chưa có người thuê')}}</p>
        </div>
    <?php } ?>
</div>
@endsection