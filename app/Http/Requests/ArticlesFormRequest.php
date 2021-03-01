<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

        $id = $this->route('article')['id'] ?? 1;

        $slug = 'unique:articles,slug,'.$id.'|regex:/^[a-z0-9 .\-]+$/i';

        return [
            'slug' => $slug,
            'title' => 'required|min:5|max:100',
            'body' => 'required|max:255',
        ];
    }
}
