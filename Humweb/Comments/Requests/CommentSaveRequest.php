<?php

namespace Humweb\Comments\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentSaveRequest extends FormRequest
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
        $rules = [
            'commentable_type' => 'required',
            'commentable_id'   => 'required',
            'body'             => 'required',
        ];

        return $rules;
    }
}
