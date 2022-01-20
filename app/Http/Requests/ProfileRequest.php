<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string',
            'occupation' => ['required'],
            'bio' => ['required'],
            'relationship_status' => ['required'],
            'country_of_birth' => ['required'],
            'min_price' => ['required'],
            'max_price' => ['required'],
            'smokers_ok' => ['required'],
            'pets_ok' => ['required'],
            'min_age' => ['required'],
            'max_age' => ['required'],
            'preferred_gender' => ['required'],
            'location' => ['required'],
            'mobile' => ['required']
        ];
    }
}
