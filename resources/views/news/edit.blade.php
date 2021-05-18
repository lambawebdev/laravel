@extends('layout')

@section('title', 'Изменить статью')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Изменение статьи
        </h3>

        @include('layout.errors')

        @include('layout.success')

        <form method="POST" action="{{ route('admin.news.update', $news->id) }}">

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="inputTitle">Название новости</label>
                <input type="text" class="form-control" id="inputTitle" name="title" value="{{old('title', $news->title)}}" placeholder="Введите название статьи">
            </div>
            <div class="form-group">
                <label for="inputBody">Описание новости</label>
                <textarea class="form-control" id="inputBody" rows="6" name="body"> {{old('body', $news->body)}}
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Обновить новость</button>
        </form>

        <form method="POST" action="{{ route('admin.news.delete', $news->id) }}">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Удалить новость</button>
        </form>

    </div>

@endsection