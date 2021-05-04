<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function article()
    {
        $this->belongsTo(Article::class);
    }

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
