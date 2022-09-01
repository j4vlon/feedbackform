@extends('layouts.header') @section('title', 'Авторизация') @section('content')
	@if(session()->has('danger'))
        <div class="alert alert-danger fade show" role="alert">
            {{ session()->get('danger') }}
        </div>
    @endif
@endsection