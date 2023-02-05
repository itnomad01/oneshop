<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;
use App\Models\Mediafile;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->access_level > 0);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'category_id' => ['nullable', 'numeric', 'exists:App\Models\Category,id'],
            'picture_id' => ['nullable', 'numeric', 'exists:App\Models\Mediafile,id'],
        ];
    }
}
