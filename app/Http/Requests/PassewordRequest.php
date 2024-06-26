<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PassewordRequest extends FormRequest
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
        $rulers = [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
       ];
       if(Auth::user()->password != null)
       {
            $rulers += ['current_password' => ['required', 'string', 'min:8'],];
       }
       return $rulers;
    }
}
