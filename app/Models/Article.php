<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

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
        return $this->belongsToMany(Tag::class);
    }

    public function addStep($attributes)
    {
        return $this->steps()->create($attributes);
    }
}
