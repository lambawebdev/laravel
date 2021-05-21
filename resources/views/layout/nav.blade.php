<div class="nav-scroller py-1 mb-2">
    <nav class="nav text-left">
        <a class="p-2 text-muted" href="/">Главная</a>
        <a class="p-2 text-muted" href="{{ route('about') }}">О нас</a>
        <a class="p-2 text-muted" href="{{ route('contacts') }}">Контакты</a>
        <a class="p-2 text-muted" href="{{ route('articles.create') }}">Создать статью</a>
        <a class="p-2 text-muted" href="{{ route('articles') }}">Список статей</a>
        <a class="p-2 text-muted" href="{{ route('news.create') }}">Создать новость</a>
        <a class="p-2 text-muted" href="{{ route('news') }}">Список новостей</a>
        @admin
        <a class="p-2 text-muted" href="{{ route('admin.feedback') }}">Админ. раздел</a>
        <a class="p-2 text-muted" href="{{ route('admin.articles') }}">Все статьи</a>
        <a class="p-2 text-muted" href="{{ route('admin.news') }}">Админ. новости</a>
        @endadmin
    </nav>
</div>