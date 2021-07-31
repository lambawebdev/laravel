<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheFlushTrait;

class News extends Model
{
    use HasFactory, CacheFlushTrait;

    protected $guarded = [];

    static string $tag = 'news';

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable')->latest();
    }

    public function addComment($attributes)
    {
        $this->comments()->create($attributes);
    }
}
