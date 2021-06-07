@extends('layout')

@section('title', 'Список статей')

@section('content')


    @include('layout.popup')

    <div class="col-md-8 blog-main">

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Статистика
        </h3>

        <ul class="list-group">
            <li class="list-group-item">Общее количество статей - <span> {{$statisticData['totalArticles']}}</span></li>
            <li class="list-group-item">Общее количество новостей - <span> {{$statisticData['totalNews']}}</span></li>
            <li class="list-group-item">ФИО автора, у которого больше всего статей на сайте - <span> {{$statisticData['mostArticlesUser']}}</span></li>
            <li class="list-group-item">Самая длинная статья — название - <span> {{$statisticData['longestArticleTitle']}} </span>, <a href="{{ route('articles.article', $statisticData['longestArticleId']) }}">ссылка на статью </a> и длина статьи <span> {{ $statisticData['longestArticleLength'] }}</span></li>
            <li class="list-group-item">Самая короткая статья — название - <span> {{$statisticData['shortestArticleTitle']}} </span>, <a href="{{ route('articles.article', $statisticData['shortestArticleId']) }}">ссылка на статью </a> и длина статьи <span> {{ $statisticData['shortestArticleLength'] }}</span></li>
            <li class="list-group-item">Средние количество статей у активных пользователей (пользователь считается активным, если у него более 1 статьи) - <span> {{$statisticData['avgArticlesInActiveUser']}}</span></li>
            <li class="list-group-item">Самая непостоянная — название, ссылка на статью, которую меняли больше всего раз - <span> {{$statisticData['mostChangebleArticleTitle']}} </span>, <a href="{{ route('articles.article', $statisticData['mostChangebleArticleId']) }}">ссылка на статью </a></li>
            <li class="list-group-item">Самая обсуждаемая статья — <span> {{$statisticData['mostCommentableArticleTitle']}} </span>, <a href="{{ route('articles.article', $statisticData['mostCommentableArticleId']) }}">ссылка на статью </a> у которой больше всего комментариев</li>
        </ul>
    </div>

@endsection