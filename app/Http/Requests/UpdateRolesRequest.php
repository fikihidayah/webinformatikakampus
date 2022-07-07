<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRolesRequest extends FormRequest
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
        return [
            'favicon' => 'file|dimensions:max_width=64,max_height=64,ratio=1/1|mimes:ico',
            'icon' => 'file|max:512|mimes:png',
            'nama_web' => 'required|max:200',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'alamat' => 'required|max:255',
            'telpon' => 'required|max:20',
            'email' => 'email:spoof',
            'fb' => 'string|nullable',
            'link_fb' => 'url|nullable',
            'ig' => 'string|nullable',
            'link_ig' => 'url|nullable',
            'yt' => 'string|nullable',
            'link_yt' => 'url|nullable',
            'bg_login' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'favicon' => 'Favicon',
            'icon' => 'Icon',
            'nama_web' => 'Nama Website',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'alamat' => 'Alamat',
            'telpon' => 'Telpon',
            'fb' => 'Nama Facebook',
            'fb_link' => 'URL Facebook',
            'yt' => 'Nama Youtube',
            'yt_link' => 'URL Youtube',
            'ig' => 'Nama Instagram',
            'ig_link' => 'URL Instagram',
            'bg_login' => 'Background Halaman Login'
        ];
    }
}
