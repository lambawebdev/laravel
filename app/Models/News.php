<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            Cache::tags(['news', 'news_admin', 'statistics'])->flush();
        });

        self::updated(function($model){
            Cache::tags(['news', 'news_admin', 'statistics'])->flush();
        });

        self::deleted(function($model){
            Cache::tags(['news', 'news_admin', 'statistics'])->flush();
        });
    }

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
