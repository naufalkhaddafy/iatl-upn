<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        // dd($this->user->id);     
        return [
            'name'=> 'required|min:2|max:255',
            // 'email'=> 'required|email|unique:users',
            // 'email'=> ['required','email', $this->method() === 'POST' ? Rule::unique('users','email')->ignore($this->user?->id) : Rule::unique('users','email')->ignore($this->user()->id) ],
            'email'=> ['required','email', Rule::unique('users','email')->ignore($this->user->id ?? $this->user()?->id) ],
            // 'nim'=> [$this->user()?->getRoleNames()[0] !== 'user'  ? 'nullable' : 'required', $this->method() === 'POST' ? Rule::unique('users','nim')->ignore($this->user?->id) : Rule::unique('users','nim')->ignore($this->user()->id) ],
            'nim'=> [$this->user()?->getRoleNames()[0] !== 'user'  ? 'nullable' : 'required', Rule::unique('users','nim')->ignore($this->user?->id ?? $this->user()?->id)  ],
            'address' => 'nullable|max:255',
            'phone_number'=> 'nullable|digits_between:7,15|numeric',
            'image'=>'nullable',
            'motto'=>'nullable',
            'goal'=>'nullable',
            'company_name'=>'nullable',
            'company_address'=>'nullable',
            'position'=>'nullable',
            'password'=>[ 'nullable', 'min:5', 'confirmed'],
            // 'password'=>[ $this->method() !=='POST' ? 'required' : 'nullable', 'min:5', 'confirmed'],
        ];
    }
}
