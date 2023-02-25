@extends('layouts.auth-layout')

@section('content')
    <div class="position-absolute container  d-flex h-100 flex-column justify-content-center align-items-center">
        <form class="d-flex flex-column w-50" method="post" action="{{ route('register.perform') }}">
            <div class="container">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="d-flex container justify-content-center align-items-center">
                    <div class="row">
                        <img class="mb-4"
                            src="https://www.vippng.com/png/full/211-2114276_the-bleach-fan-club-bleach-anime-logo-png.png"
                            width="300">
                    </div>
                </div>
                <div class="d-flex container justify-content-center align-items-center">
                    <div class="row">
                        <h1 class="h3 mb-3 fw-normal">Register</h1>
                    </div>
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                        placeholder="name@example.com" required="required" autofocus>
                    <label for="floatingEmail">Email address</label>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="name" value="{{ old('username') }}"
                        placeholder="Your name" required="required" autofocus>
                    <label for="floatingName">Username</label>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                        placeholder="Password" required="required">
                    <label for="floatingPassword">Password</label>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password_confirmation" id="floatingConfirmPassword"
                        value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                    <label for="floatingConfirmPassword">Confirm Password</label>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                @include('auth.partials.messages')
                <div class="d-flex container justify-content-center align-items-center">
                    <div class="row">
                        <button class=" btn btn-lg btn-primary" type="submit">Register</button>
                    </div>
                </div>
                <div class="d-flex container justify-content-center align-items-center">
                    <div class="row">
                        @include('auth.partials.copy')
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
