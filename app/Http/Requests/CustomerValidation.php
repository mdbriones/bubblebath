<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
class CustomerValidation extends FormRequest
{
    public function authorize()
    {
        return auth()->check();;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customerName' => "required|max:100",
            'plateNumber' => 'required|max:20'
        ];
    }

}
