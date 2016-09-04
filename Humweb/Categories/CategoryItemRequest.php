<?php
namespace Humweb\Categories;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CategoryItemRequest
 *
 * @package Humweb\Categories
 */
class CategoryItemRequest extends FormRequest
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
            'title' => 'required|max:255',
            'slug'  => 'required|max:255',
        ];
    }

}
