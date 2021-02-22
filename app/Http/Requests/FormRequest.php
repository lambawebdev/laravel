<?php

namespace App\Http\Requests;

use App\Models\Article;

class FormRequest
{
    public function validate(Article $article)
    {
        if ($article->exists()) {
            $fields = request()->validate( [
                'slug' => 'regex:/^[a-z0-9 .\-]+$/i',
                'title' => 'required|min:5|max:100',
                'body' => 'required|max:255'
            ]);
        } else {
            $fields = request()->validate([
                'slug' => 'required|unique:articles|regex:/^[a-z0-9 .\-]+$/i',
                'title' => 'required|min:5|max:100',
                'body' => 'required|max:255'
            ]);
        }
        return $fields;
    }
}