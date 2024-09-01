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
        $password = $this->password ? ['password' => ['required' , 'min:5', 'confirmed']] : ['password' => ['required' , 'min:5', 'confirmed']];
        return [
            'name'=> 'required|min:2|max:255',
            'email'=> ['required','email', Rule::unique('users','email')->ignore($this->user?->id)],
            'nim'=> ['numeric', $this->user()?->getRoleNames()[0] == 'admin'  ? 'nullable' : 'required', Rule::unique('users','nim')->ignore($this->user?->id)],
            'phone_number'=> [$this->method() == 'PUT'  && $this->user()?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable','digits_between:7,15','numeric' ],
            'domicile' => [ $this->method() == 'PUT'  && $this->user()?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable','max:255'],
            'address_now' => [$this->method() == 'PUT' && $this->user()?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable','max:255'],
            'domicile_id'=>[ $this->method() == 'PUT'  && $this->user()?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable'],
            'regency_id'=>[$this->method() == 'PUT'  && $this->user()?->getRoleNames()[0] !== 'admin' ? 'required' : 'nullable'],
            'image'=>'nullable|max:2000|mimes:png,jpg,jpeg',
            'motto'=>'nullable',
            'goal'=>'nullable',
            'company_name'=>'nullable',
            'company_address'=>'nullable',
            'position'=>'nullable',
            ...$password,
        ];

    }
}
