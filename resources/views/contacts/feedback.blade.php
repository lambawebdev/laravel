@extends('layout')

@section('title', 'Сообщения от пользователей')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Обращение от пользователей:
        </h3>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Сообщение</th>
                <th scope="col">Дата создания</th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedback as $feed)
            <tr>
                <th scope="row">{{ $feed->id }}</th>
                <td>{{ $feed->email }}</td>
                <td>{{ $feed->body }}</td>
                <td>{{ $feed->created_at }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <hr>
        <a href="{{route("index")}}">Вернутся на главную</a>

    </div>

@endsection

