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
            'picture_url' => 'nullable|file|image|mimes:JPG, PNG, GIF|max:2048|dimensions:max_width=500',
            'picture_url' => [new MegaBytes(5)],
        ];
    }
    
    public function messages()
    {
        return [
            "title.max" => "部位は最大２５文字です。",
            "content.max" => "メニューは最大２５５文字です。",
            "required" => "必須項目です。",
            "picture_url.image" => "指定されたファイルではありません。",
            "picture_url.mines" => "指定された拡張子（PNG/JPG/GIF）ではありません。",
            "picture_url.max" => "5Ｍを超えています。",
            "picture_url.dimensions" => "画像の横幅は最大500pxです。",
            ];
    }
}
