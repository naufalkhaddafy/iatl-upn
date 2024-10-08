<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class AdminRequest extends FormRequest
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
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user?->id)],
            'password' => [$this->method() !== 'POST' ? 'nullable' : 'required', 'min:5', 'confirmed'],
            'phone_number' => ['nullable', 'digits_between:7,15', 'numeric'],
            'image' => ['nullable', 'max:2000', 'mimes:png,jpg,jpeg'],
        ];
    }
}
