<?php

namespace App\Http\Requests;

use App\Rules\MegaBytes;

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
            'title' => 'required|max:25',
            'content' => 'required|max:255',
            'picture_url' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=500',
            'picture_url' => [new MegaBytes(5)],
        ];
    }
}
