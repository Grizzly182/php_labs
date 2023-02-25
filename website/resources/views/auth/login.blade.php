@extends('layouts.auth-layout')

@section('content')
    <div class="position-absolute container  d-flex h-100 flex-column justify-content-center align-items-center">
        <form class="d-flex flex-column w-50" method="post" action="{{ route('login.perform') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="d-flex container justify-content-center align-items-center">
                <div class="row">
                    <img class="mb-4"
                        src="https://www.vippng.com/png/full/211-2114276_the-bleach-fan-club-bleach-anime-logo-png.png"
                        width="300">
                </div>
            </div>

            <h1 class="h3 mb-3 fw-normal">Login</h1>


            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email"
                    required="required" autofocus>
                <label for="floatingName">Email or Username</label>
                @if ($errors->has('username'))
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
            @include('auth.partials.messages')
            <div class="d-flex container justify-content-center align-items-center">
                <div class="row">

                    <button class=" btn btn-lg btn-primary" type="submit">Login</button>
                </div>
            </div>

            @include('auth.partials.copy')
        </form>
    </div>
@endsection
