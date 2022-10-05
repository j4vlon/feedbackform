@extends('layouts.header') @section('title', 'Авторизация') @section('content')

<form method="POST" style="width: 60%; margin: 0 auto">
    @csrf
    <h2>Форма аутентификации</h2>
    <div class="form-group">
        <input
            type="text"
            class="form-control"
            placeholder="Введите email"
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
            placeholder="Введите пароль"
            value=""
            name="password"
        />
        @if ($errors->has('password'))
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
        @endif
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Login" />
    </div>
</form>

@endsection