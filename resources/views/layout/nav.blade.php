<div class="nav-scroller py-1 mb-2">
    <nav class="nav text-left">
        <a class="p-2 text-muted" href="/">Главная</a>
        <a class="p-2 text-muted" href="/about">О нас</a>
        <a class="p-2 text-muted" href="/contacts">Контакты</a>
        <a class="p-2 text-muted" href="/articles/create">Создать статью</a>
        <a class="p-2 text-muted" href="/articles">Список статей</a>
        @admin
        <a class="p-2 text-muted" href="{{ route('admin.feedback') }}">Админ. раздел</a>
        <a class="p-2 text-muted" href="{{ route('admin.articles') }}">Все статьи</a>
        @endadmin
    </nav>
</div>