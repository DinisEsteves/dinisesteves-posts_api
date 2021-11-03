<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        return [
            "orderby" => [],
            "order" => [],
            "post_id" => [],
            "post_name" => [],
            "post_type" => [],
            "post_status" => [],
            "post_children" => [],
            "post_parent" => [],
            "posts_per_page" => [],
        ];
    }
}
