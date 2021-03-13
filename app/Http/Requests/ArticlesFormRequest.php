<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use app\Models\Article;

class ArticlesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $article = Article::where('slug', '=', $_POST['slug'])->first();
        if ($article === null) {
            $slug = 'unique:articles|regex:/^[a-z0-9 .\-]+$/i';
        } else {
            $id = $this->route('article')['id'];
            $slug = 'unique:articles,slug,'.$id.'|regex:/^[a-z0-9 .\-]+$/i';
        }

        return [
            'slug' => $slug,
            'title' => 'required|min:5|max:100',
            'body' => 'required|max:255',
        ];
    }
}
