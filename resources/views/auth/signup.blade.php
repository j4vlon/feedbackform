@extends('layouts.header') @section('title', 'Регистрация') @section('content')
<form
    action=""
    method="POST"
    style="width: 60%; margin: 0 auto"
>
    @csrf
    <div class="form-group">
        <input
            type="text"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
            placeholder="First Name *"
            value=""
            name="name"
        />
        @if ($errors->has('name'))
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div class="form-group">
        <input
            type="email"
            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
            placeholder="Your Email *"
            value=""
            name="email"
        />
        @if ($errors->has('email'))
        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        @endif
    </div>

    <div class="form-group">
        <input
            type="password"
            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
            placeholder="Password *"
            value=""
            name="password"
        />
        @if ($errors->has('password'))
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
        @endif
    </div>

    <a href="{{ route('login') }}">Login</a
    ><input
        type="submit"
        class="btnRegister"
        value="Register"
        style="margin-top: 0 !important"
    />
</form>

@endsection