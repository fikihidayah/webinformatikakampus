<?php

namespace App\Http\Requests;

use App\Models\CategoryNews;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateCategoryNewsRequest extends FormRequest
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
        $category = $this->route('category');
        return [
            // 'name' => ['required', 'max:100', Rule::unique('category')->ignore($this->category)],
            'name' => 'required|max:100|unique:category,name,' . $category->id,
            'bg_color' => 'required',
            'slug' => 'alpha_dash',
            'description' => 'string|nullable|max:300'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama Kategori'
        ];
    }
}
