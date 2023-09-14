<?php

namespace App\Http\Requests;

use App\Models\Company_profile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            'phone' => ['required', 'numeric', 'digits:8'],
            'fax' => ['nullable', 'numeric', 'digits:8'],
            'address'=>['required', 'string', 'max:255'],
            'about'=>['required', 'string'],
            'site_url'=>['nullable', 'string', 'max:255'],
            'facebook'=>['nullable', 'string', 'max:255'],
            'instagram'=>['nullable', 'string', 'max:255'],
            'linkedin'=>['nullable', 'string', 'max:255'],
            'domain'=>['required', 'string', 'max:255'],
        ];
        if($this->getMethod() == "POST")
        {
            $rules += [
                "logo" => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            ];
        }
        if($this->getMethod() == "PUT")
        {
            $rules += [
                "logo" => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            ];
        }

        // email

        if($this->getMethod() == "POST")
        {
            $rules += [
                'company_email' => ['required', 'string', 'email', 'max:255', 'unique:company_profiles'],
            ];
        }
        // agrement
        if($this->getMethod() == "POST")
        {
            $rules += [
                'agrement' =>['required', 'string', 'min:29', 'max:29'],
            ];
        }
        
        if($this->getMethod() == "PUT")
        {
            $company = Company_profile::find(Auth::id());
            $email = $company->company_email;
            //unique email
            if($_REQUEST['company_email'] != $email)
            {
                $rules += [
                    'company_email' => ['string', 'email', 'max:255',
                    Rule::unique('company_profiles')->ignore($this->company)
                ],
                ];
            }
            else{
                $rules += [
                    'company_email' => ['string', 'email', 'max:255',
                ],
                ];
            }
            // unique agrement
            if($_REQUEST['agrement'] != $company->agrement)
            {
                $rules += [
                    'agrement' => ['string', 'min:29', 'max:29',
                    Rule::unique('company_profiles')->ignore($this->company)
                ],
                ];
            }
            else{
                $rules += [
                    'agrement' => ['string', 'min:29', 'max:29',
                ],
                ];
            }

        }
        return $rules;
    }
}
