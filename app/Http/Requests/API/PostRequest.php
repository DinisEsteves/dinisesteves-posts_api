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
            "orderby" => ['string'],
            "order" => ['string'],
            "post_id" => ['integer'],
            "post_name" => ['string'],
            "post_type" => ['string'],
            "post_status" => ['string'],
            "post_children" => ['string','integer'],
            "post_parent" => ['string','integer'],
            "posts_per_page" => ['integer']
        ];
    }
}
