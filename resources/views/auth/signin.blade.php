@extends('layouts.header') @section('title', 'Авторизация') @section('content')

<form action="" method="POST">
    @csrf
    <div class="form-group">
        <input
            type="text"
            class="form-control"
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
            class="form-control"
            placeholder="Your Password *"
            value=""
            name="password"
        />
        @if ($errors->has('password'))
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
        @endif
    </div>
    <div class="form-group">
        <input type="submit" class="btnSubmit" value="Login" />
    </div>
</form>

@endsection