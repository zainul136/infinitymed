@extends('user.layouts.app')

@section('main-content')
    <div class="container" style="margin-top: 10% !important; margin-bottom: 10%;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #055875">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">

                                <div class="col-md-10 mx-auto">
                                    <label for="email"
                                           class=" col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-10 mx-auto">
                                    <label for="password"
                                           class=" col-form-label text-md-end">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-10 mx-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }} style="color:#055875">

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-10 mx-auto">
                                    <button type="submit" class="btn text-white btn-block"  style="background-color: #055875">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                <div class="col-md-10 mx-auto">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link pl-0" href="{{ route('password.request') }}" style="color: #055875">
                                            {{ __('Forgot Your Password?') }}

                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-10 mx-auto">
                                    <span>If you don't have account?</span>
                                    <a class="btn btn-link text-end pl-0" href="{{ route('register') }}" style="color: #055875;">
                                        {{ __('Register') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
