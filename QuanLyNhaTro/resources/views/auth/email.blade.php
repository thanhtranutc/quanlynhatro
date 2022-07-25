@extends('login')

@section('content')
<div class="form">
    <form method="POST" action="{{URL::to('/forgetpassword')}}">
        @csrf

        <div>
            <label for="email">{{ __('Email Address') }}</label>

            <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div>
            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection