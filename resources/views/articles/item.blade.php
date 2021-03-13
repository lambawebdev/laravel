<div class="blog-post">
    <h2 class="blog-post-title"><a href="{{route('articles.article', $article->id)}}">{{ $article->title }}</a></h2>
    <p class="blog-post-meta">{{ $article->created_at }}</p>

    @include('articles.tags', ['tags' => $article->tags])

    {{ $article->body }}

</div><!-- /.blog-post -->