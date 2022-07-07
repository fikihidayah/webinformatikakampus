<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->route('news'));
        return [
            'title' => 'required|max:255|string',
            'slug' => 'required|alpha_dash|unique:news,slug,' . $this->route('news')->id,
            'image' => 'file|max:2048|mimes:png,jpg,jpeg',
            'description' => 'required|max:150',
            'body' => 'required',
            'category' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'Image Hader Berita'
        ];
    }
}
