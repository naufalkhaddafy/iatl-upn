<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|',
            'image'=>'nullable',
            'email'=> 'required|unique:users',
            'nim'=> 'required|unique:users',
            'password'=> 'required|min:5|confirmed',
            'role'=>'nullable',
            'status'=>'nullable',
        ];
    }
}
