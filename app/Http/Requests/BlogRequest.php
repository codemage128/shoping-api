<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest {

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
            'title' => 'required|min:3',
            'content' => 'required|min:3',
			'blog_category_id' => 'required',
            'image' => 'required|mimes:jpg,jpeg,bmp,png,gif|max:10000'

        ];
	}

}
