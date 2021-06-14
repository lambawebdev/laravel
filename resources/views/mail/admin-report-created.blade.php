@component('mail::message')
Информация по Вашему отчету:

{{  ($reportData['news']) ? 'Новостей: ' . $reportData['news']  : ''}} <br>
{{  ($reportData['articles']) ? 'Статей: ' . $reportData['articles']  : '' }}<br>
{{  ($reportData['comments']) ? 'Комментариев: ' . $reportData['comments']  : '' }}<br>
{{  ($reportData['tags']) ? 'Тегов: ' . $reportData['tags']  : '' }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>

@endcomponent
