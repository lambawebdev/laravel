<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Tag extends Model
{
    protected $guarded = [];

    use HasFactory;

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            Cache::tags(['tags'])->flush();
        });

        self::updated(function($model){
            Cache::tags(['tags'])->flush();
        });

        self::deleted(function($model){
            Cache::tags(['tags'])->flush();
        });
    }

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
