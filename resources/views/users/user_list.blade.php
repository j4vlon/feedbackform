@extends('layouts.header') @section('title', 'Форма заявок') @section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Handle</th>
            <th scope="col">Change role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                @if (!$user->role)
                    <td>Пользователь</td>
                @else
                    <td>Админ</td>
                @endif
                <td>{{ $user->email }}</td>
                <td>
                    @if (!$user->role)
                <td>
                    <form action="{{ route('createadmin', [$user->id]) }}" method="POST">
                        @csrf<input type="submit" class="btn btn-success" value="1" name="role" />

                    </form>
                </td>
            @else
                <td>
                    <form action="{{ route('createadmin', [$user->id]) }}" method="POST">
                        @csrf<input type="submit" class="btn btn-primary" value="0" name="role" />
                    </form>
                </td>
        @endif
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
