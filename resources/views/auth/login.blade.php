@extends('layouts.app')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Sistem Informasi Geografis <br>
                    Pemetaan Lokasi dan Profil Sekolah Pontianak
                </span>
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="Email Required">
                    <span class="label-input100" for="email">{{ __('Email') }}</span>
                    <input class="input100 @error('email') is-invalid @enderror" id="email" type="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100" for="password">{{ __('Password') }}</span>
                    <input class="input100 @error('password') is-invalid @enderror" id="password" type="password" placeholder="Enter password" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="focus-input100"></span>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
