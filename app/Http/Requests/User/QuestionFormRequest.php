<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class QuestionFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'category_id' =>[
                'required',
                'integer'
            ],
            'name'=>[
                'required',
                'string',
                'max:200'
            ],
            'slug'=>[
                'required',
                'string',
                'max:200'
            ],
        ];
        return $rules;
    }
}
