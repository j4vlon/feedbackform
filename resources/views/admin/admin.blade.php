@extends('layouts.header')

@section('title', 'Сообщения')

@section('content')
<div class="col-md-12">
    <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
            <thead>
                <th>ID</th>
                <th>Имя</th>
                <th>email</th>
                <th>Тема</th>
                <th>Сообщение</th>
                <th>Файл</th>
                <th>Дата</th>
                <th>Статус</th>               
            </thead>
            <tbody>
                @foreach($user_feedback as $feedbacks)

                <tr>
                    <td>{{ $feedbacks->user_id }}</td>
                    <td>{{ $feedbacks->user_name }}</td>
                    <td>{{ $feedbacks->user_email }}</td>
                    <td>{{ $feedbacks->feedback_theme }}</td>
                    <td>{{ $feedbacks->feedback }}</td>
                    <td><a href="{{ $feedbacks->file_url }}">Download</a></td>
                    <td>{{ $feedbacks->created_at }}</td>
                    @if ($feedbacks->status !== 'Ответить')
                        <td>
                        <form action="{{ route('checkstatus', [$feedbacks->id]) }}" method="POST">
                            @csrf<input
                                type="submit"
                                class="btn btn-primary"
                                value="Ответить"
                                name="status"
                            />
                        </form>
                    </td>
                    @else
                    <td>
                        <form action="{{ route('checkstatus', [$feedbacks->id]) }}" method="POST">
                            @csrf<input
                                type="submit"
                                class="btn btn-success"
                                value="Ответил"
                                name="status"
                            />
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    
@endsection