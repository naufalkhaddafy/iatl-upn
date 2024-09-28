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
        $isPostRequest = $this->isMethod('POST');
        $isAdmin = $this->user?->getRoleNames()[0] === 'admin';
        $userId = $this->user?->id;

        return [
            'name' => 'required|min:2|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($userId)],
            'nim' => ['numeric', $isAdmin ? 'nullable' : 'required', Rule::unique('users', 'nim')->ignore($userId)],
            'generation' => [$isPostRequest || $isAdmin ? 'nullable' : 'required','digits:4','numeric'],
            'phone_number' => [$isPostRequest || $isAdmin ? 'nullable' : 'required', 'digits_between:7,15', 'numeric'],
            'domicile' => [$isPostRequest || $isAdmin ? 'nullable' : 'required', 'max:255'],
            'address_now' => [$isPostRequest || $isAdmin ? 'nullable' : 'required', 'max:255'],
            'domicile_id' => [$isPostRequest || $isAdmin ? 'nullable' : 'required'],
            'address_now_id' => [$this->method() !== 'POST' && $this->user?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable'],
            'image' => ['nullable', 'max:2000', 'mimes:png,jpg,jpeg'],
            'motto' => 'nullable',
            'goal' => 'nullable',
            'company_name' => 'nullable',
            'company_address' => 'nullable',
            'position' => 'nullable',
            'password' => [$isPostRequest ? 'required' : 'nullable', 'min:5', 'confirmed'],
        ];
    }
}
