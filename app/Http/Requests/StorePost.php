<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'        => 'required|string',
            'abstract'     => 'required',
            'content'      => 'required',
            'user_id'      => 'integer',
            'status'       => 'in:published,unpublished',
            'published_at' => 'date:Y-m-d H:i:s',
            'picture'      => 'image|max:1000',
            'picture_name' => 'string|max:40'
        ];
    }
}
