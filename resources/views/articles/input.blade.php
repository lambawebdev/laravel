<div class="form-group">
    <label for="inputSlug">Символьный код</label>
    <input type="text" class="form-control" id="inputSlug" name="slug" value="{{old('slug', $article->slug ?? '')}}" placeholder="Введите символьный код">
</div>
<div class="form-group">
    <label for="inputTitle">Название статьи</label>
    <input type="text" class="form-control" id="inputTitle" name="title" value="{{old('title', $article->title ?? '')}}" placeholder="Введите название статьи">
</div>
<div class="form-group">
    <label for="inputBody">Описание статьи</label>
    <input type="text" class="form-control" id="inputBody" name="body" value="{{old('body', $article->body ?? '')}}" placeholder="Введите описание статьи">
</div>