<div class="blog-post">
    <h2 class="blog-post-title"><a href="/articles/{{$article->id}}">{{ $article->title }}</a></h2>
    <p class="blog-post-meta">{{ $article->created_at }}</p>
    {{ $article->body }}
</div><!-- /.blog-post -->