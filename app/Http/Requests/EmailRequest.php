<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EmailRequest extends FormRequest
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
        if($this->getMethod() == "PUT")
        {
            $user = Auth::user();
            if($_REQUEST['email'] != $user->email)
            {
                $rules = [
                    'email' => ['string', 'email', 'max:255',
                    Rule::unique('users')->ignore($this->user)
                ],
                ];
            }else{
                $rules = [
                    'email' => ['string', 'email', 'max:255',
                    Rule::unique('users')->ignore($this->user)
                ],
                ];
            }

        }
        return $rules;
    }
}
