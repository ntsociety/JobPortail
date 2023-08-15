<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffreRequest extends FormRequest
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
        return [
            'title'=> ['required', 'string', 'max:50'],
            'cate_id'=> ['numeric'],
            'region'=> ['required', 'string', 'max:50'],
            'type'=> ['required', 'string', 'max:20'],
            'vacancy'=> ['required', 'numeric', 'max:3'],
            'experience'=>['required', 'string', 'max:50'],
            'salary'=>['required', 'string', 'max:50'],
            'gender'=>['required', 'string', 'max:50'],
            'apps_deadline'=>['required', 'string', 'max:50'],
            'description'=>['required', 'string'],
            'responsibilities'=>['required', 'string'],
            'education_experience'=>['required', 'string'],
            'other_benifits'=>['string'],
        ];
    }
    public function messages()
    {
        return[
            'required' => 'Ce Champ est nécessaire',
        ];
    }
}
