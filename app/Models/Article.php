<?php

namespace App\Models;

use App\Events\ArticleCreated;
use App\Events\ArticleModified;
use App\Events\ArticleDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => ArticleCreated::class,
        'updated' => ArticleModified::class,
        'deleted' => ArticleDeleted::class,
    ];

    public static function completed()
    {
        return static::where('completed', 1)->get();
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);

        /*App\Models\Task::incomplete()->latest()->where('id',2)->get();*/
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function addStep($attributes)
    {
        return $this->steps()->create($attributes);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable')->latest();
    }

    public function addComment($attributes)
    {
        $this->comments()->create($attributes);
    }

    public function history()
    {
        return $this->hasMany(ArticleHistory::class)->latest();
    }

}
