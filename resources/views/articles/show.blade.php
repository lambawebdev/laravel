@extends('layout')

@section('title', $article->title)

@section('content')

    <div class="col-md-8 blog-main">
        <a href="{{route('articles.edit', $article->id)}}">Изменить</a>
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $article->title }}
        </h3>

        @include('articles.tags', ['tags' => $article->tags])

        {{ $article->body }}

        @if ($article->steps->isNotEmpty())
            <ul class="list-group">
                @foreach($article->steps as $step)
                    <li class="list-group-item">
                        <form method="POST" action="/completed-steps/{{ $step->id }}">
                            @if ($step->completed)
                                @method('DELETE')
                            @endif
                            @csrf
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="completed"
                                        onclick="this.form.submit()"
                                        {{ $step->completed ? 'checked' : ''}}
                                    >
                                    {{ $step->description }}
                                </label>
                            </div>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif

        <form class="card card-body mb-4" method="POST" action="/articles/{{ $article->id }}/steps">
            @csrf
            <div class="form-group">
                <input
                    class="form-control"
                    type="text"
                    placeholder="Шаг"
                    value="{{ old('description') }}"
                    name="description"
                >
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>



        </form>

        @include('layout.errors')

        <hr>
        <a href="{{route('articles')}}">Вернутся к списку статей</a>

    </div>

@endsection





