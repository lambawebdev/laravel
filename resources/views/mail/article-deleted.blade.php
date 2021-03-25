@component('mail::message')
# Статья удалена {{ $article->title }}

{{ $article->body }}

@component('mail::button', ['url' => route('articles.article', $article->id)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
