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



        <form method="POST" action="{{ route("contacts.report") }}">

            @csrf

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Выберите для отчета
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="news" id="Check1">
                        <label class="form-check-label" for="Check1">Новости</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="articles" id="Check2">
                        <label class="form-check-label" for="Check2">Статьи</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="comments" id="Check3">
                        <label class="form-check-label" for="Check3">Комментарии</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="tags" id="Check4">
                        <label class="form-check-label" for="Check4">Теги</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Сформировать отчет</button>

                </div>
            </div>
        </form>

        <hr>

        <div id="report">
            <report-created></report-created>
        </div>


        <hr>
        <a href="{{route("index")}}">Вернутся на главную</a>

    </div>

@endsection

