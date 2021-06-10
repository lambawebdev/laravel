@component('mail::message')
Информация по Вашему отчету:

@if(array_key_exists('news', $reportData['request']))
    {{ 'Новости: ' . $reportData['articles'] }}
@endif
@if(array_key_exists('articles', $reportData['request']))
    {{ 'Статьи: ' . $reportData['news'] }}
@endif
@if(array_key_exists('comments', $reportData['request']))
    {{ 'Комментарии: ' . $reportData['comments'] }}
@endif
@if(array_key_exists('tags', $reportData['request']))
    {{ 'Теги: ' . $reportData['tags']}}
@endif

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>

@endcomponent
