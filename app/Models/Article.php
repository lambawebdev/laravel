<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public static function completed()
    {
        return static::where('completed', 1)->get();
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);

        /*App\Models\Task::incomplete()->latest()->where('id',2)->get();*/
    }
}
