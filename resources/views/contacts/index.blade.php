@extends('layout')

@section('title', 'Обратная связь')

@section('content')


    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Обратная связь
        </h3>

        @include('layout.errors')

        @include('layout.success')

        <form action={{route("contacts")}} method="post">

            @csrf

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Введите email">
            </div>
            <div class="form-group">
                <label for="msg">Сообщение</label>
                <input type="text" class="form-control" name="msg" id="msg" value="{{old('msg')}}" placeholder="Введите сообщение">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>

        <hr>
        <a href="{{route("index")}}">Вернутся на главную</a>

    </div>

@endsection

