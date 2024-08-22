<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|',
            'email'=> 'required|email|unique:users',
            // 'email'=> ['required','email', Rule::unique('users','email')->ignore($this->user?->id)],
            // 'email'=> ['required','email','unique:users,email,id'.$this->user?->id],
            'nim'=> 'required|unique:users',
            'address' => 'nullable|max:255',
            'number_phone'=> 'nullable|unique:users|min:6|max:15|numeric',
            'image'=>'nullable',
            'motto'=>'nullable',
            'goal'=>'nullable',
            'company_name'=>'nullable',
            'company_address'=>'nullable',
            'position'=>'nullable',
            'password'=> 'required|min:5|confirmed',
        ];
    }
}
