<?php

use Illuminate\Support\Facades\Session; ?>
<?php $error = Session::get('message'); ?>
@extends('login')

@section('content')
<div class="form">
    <?php
    if ($error) {
        echo '<span style="color:red;" class="text-alert">' . $error . '</span>';
        Session::put('message', null);
        echo '<br></br>';
        echo '  ';
    }

    if (isset($message)) {
        echo '<span style="color:green;" class="text-alert">' . $message . '</span>';
        $message = null;
    }
    ?>
    <form class="register-form" action="{{URL::to('/register')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name" />
        <input type="password" name="password" placeholder="password" />
        <input type="text" name="email" placeholder="email address" />
        <button type="submit">create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" action="{{URL::to('/login')}}" method="post">
        @csrf
        <input type="text" name="email" placeholder="Nhập email" />
        @error('email')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <input type="password" name="password" placeholder="Nhập password" />
        @error('password')
        <ul>
            <li style="color:red;">{{$message}}</li>
        </ul>
        @enderror
        <button type="submit">login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
        <p class="message"><a href="{{URL::to('/forget-password')}}">{{__('Forget password')}}</a></p>
    </form>
</div>
@endsection