@component('mail::message')
# Cтатья изменена {{ $article->title }}

{{ $article->body }}

@component('mail::button', ['url' => '/articles/' . $article->id])
Посмотреть статью
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
