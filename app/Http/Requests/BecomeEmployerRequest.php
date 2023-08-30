<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BecomeEmployerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
       
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'company_email' => ['required', 'string', 'email', 'max:255', 'unique:company_profiles'],
            'phone' => ['required', 'numeric', 'digits:8'],
            'fax' => ['nullable', 'numeric', 'digits:8'],
            'address'=>['required', 'string', 'max:255'],
            'agrement'=>['required', 'string', 'min:29', 'max:29'],
            'about'=>['required', 'string'],
            'site_url'=>['nullable', 'string', 'max:255'],
            'fb_user'=>['nullable', 'string', 'max:255'],
            'twit_user'=>['nullable', 'string', 'max:255'],
            'link_user'=>['nullable', 'string', 'max:255'],
            'domain'=>['required', 'string', 'max:255'],
        ];
        if($this->getMethod() == "POST")
        {
            $rules += [
                "logo" => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            ];
        }
        if($this->getMethod() == "PUT")
        {
            $rules += [
                "logo" => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            ];
        }
        return $rules;
    }
}
