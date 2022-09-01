@extends('layouts.header') @section('title', 'Форма заявок') @section('content')
<div class="tab-content" id="myTabContent">
    <div
        class="tab-pane fade show active"
        id="home"
        role="tabpanel"
        aria-labelledby="home-tab"
    >
        <h3 class="register-heading">Оставьте сообщение</h3>
        @if(session()->has('success'))
        <div class="alert alert-success fade show" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
        <div class="row register-form">
            <div class="col-md-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control {{ $errors->has('theme') ? 'is-invalid' : '' }}"
                            placeholder="Тема сообщения"
                            value=""
                            name="theme"
                        />
                        @if ($errors->has('theme'))
                        <div class="invalid-feedback">
                            {{ $errors->first('theme') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea
                            type="text"
                            class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"
                            placeholder="Сообщение"
                            value=""
                            name="message"
                        ></textarea>
                        @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input
                            type="file"
                            class="form-control {{ $errors->has('file_url') ? 'is-invalid' : '' }}"
                            name="file_url"
                        />
                    </div>
                    @if ($errors->has('file_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_url') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <input
                            type="submit"
                            class="btnSubmit"
                            value="Отправить"
                        />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
