<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheFlushTrait;


class Tag extends Model
{
    protected $guarded = [];

    use HasFactory, CacheFlushTrait;

    static string $tag = 'tags';

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCloud()
    {
        return (new static)->has('articles')->get();
    }
}
