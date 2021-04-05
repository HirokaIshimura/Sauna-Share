<?php

namespace App\Http\Requests;

use App\Rules\MegaBytes;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'max:15',
            'profile_image' => 'file|image|mimes:jpeg,png,jpg,gif|dimensions:max_width=500',
            'profile_image' => [new MegaBytes(5)],
        ];
    }
    
    public function messages(){
        return [
            "required" => "必須項目です。",
            "image" => "指定されたファイルではありません。",
            "mines" => "指定された拡張子（PNG/JPG/GIF/JPEG）ではありません。",
            "max" => "5Ｍを超えています。",
            "dimensions" => "画像の横幅は最大500pxです。",
            ];
    }
}
