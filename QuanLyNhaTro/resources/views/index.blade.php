<?php $user_name = session('user_name'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/extend.css">
    <link rel="stylesheet" type="text/css" href="css/custom2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="js/extend.js"></script>
</head>

<body>

    <div class="sidenav">
        <a href="{{route('apartment.list')}}">Quản lý tòa nhà</a>
        <a href="{{route('room.list')}}">Quản lý phòng trọ</a>
        <a href="{{route('roomfee.list')}}">Quản lý tiền trọ hàng tháng</a>
        <a href="{{route('statistic')}}">Thống kê</a>
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