@component('mail::message')
# Создана новая статья: {{ $article->title }}

{{ $article->body }}

@component('mail::button', ['url' => '/articles/' . $article->id])
Посмотреть статью
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
