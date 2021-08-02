<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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

    public function rules()
    {
        return [
            'title' => 'required|max:50',
			'summary' => 'required|max:500',
			'details' => 'required',
			'publish_date' => 'required',
			'category_id' => 'required',
			'image' => 'required'
			
        ];
    }
}
