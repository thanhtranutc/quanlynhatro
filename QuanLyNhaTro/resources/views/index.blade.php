<?php

use Illuminate\Support\Facades\Session; ?>
<?php $user_name = Session::get('user_name'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/extend.css">
</head>
<style>
    .menu {
        display: block;
    }

    .menu-item {
        width: 200px;
        margin: 10px;
        float: right;
    }

    .menu-item.first {
        text-align: right;
        width: 50px !important;
    }

    .main {
        display: block;
    }
</style>

<body>

    <div class="sidenav">
        <a href="{{URL::to('/list-apartment')}}">Quản lý tòa nhà</a>
        <a href="#">Quản lý phòng trọ</a>
        <a href="#">Quản lý tiền trọ hàng tháng</a>
        <a href="#">Thống kê</a>
    </div>
    <div class="main">
        <div class="menu">
            <div class="menu-item first">
                <a class="btn-logout" href="{{URL::to('/logout')}}">logout</a>
            </div>
            <div class="menu-item">
                <span class="infor-admin">Xin chào: {{$user_name}}</span>
            </div>

        </div>
        <div class="block-content">
            @yield('content')
        </div>
    </div>


</body>

</html>