@extends('layout')

@section('title', 'Создать статью')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">

        </h3>

        @include('layout.errors')

        @include('layout.success')

        <form method="post" action={{route("articles")}}>

            @csrf

            <div class="form-group">
                <label for="inputSlug">Символьный код</label>
                <input type="text" class="form-control" id="inputSlug" name="slug" value="{{old('slug')}}" placeholder="Введите символьный код">
            </div>
            <div class="form-group">
                <label for="inputTitle">Название статьи</label>
                <input type="text" class="form-control" id="inputTitle" name="title" value="{{old('title')}}" placeholder="Введите название статьи">
            </div>
            <div class="form-group">
                <label for="inputBody">Описание статьи</label>
                <input type="text" class="form-control" id="inputBody" name="body" value="{{old('body')}}" placeholder="Введите описание статьи">
            </div>
            <button type="submit" class="btn btn-primary">Добавить статью</button>
        </form>

    </div>

@endsection