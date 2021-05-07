<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleHistory extends Model
{
    use HasFactory;

    protected $casts = [
        'article_changes' => 'array',
    ];


    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
