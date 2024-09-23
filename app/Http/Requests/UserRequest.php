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
        return [
            'name' => 'required|min:2|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user?->id)],
            'nim' => ['numeric', $this->user?->getRoleNames()[0] == 'admin' ? 'nullable' : 'required', Rule::unique('users', 'nim')->ignore($this->user?->id)],
            'generation' => [$this->method() !== 'POST' && $this->user?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable','digits:4','numeric'],
            'phone_number' => [$this->method() !== 'POST' && $this->user?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable', 'digits_between:7,15', 'numeric'],
            'domicile' => [$this->method() !== 'POST' && $this->user?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable', 'max:255'],
            'address_now' => [$this->method() !== 'POST' && $this->user?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable', 'max:255'],
            'domicile_id' => [$this->method() !== 'POST' && $this->user?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable'],
            'address_now_id' => [$this->method() !== 'POST' && $this->user?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable'],
            'image' => ['nullable', 'max:2000', 'mimes:png,jpg,jpeg'],
            'motto' => 'nullable',
            'goal' => 'nullable',
            'company_name' => 'nullable',
            'company_address' => 'nullable',
            'position' => 'nullable',
            'password' => [$this->method() !== 'POST' ? 'nullable' : 'required', 'min:5', 'confirmed'],
        ];
    }
}
