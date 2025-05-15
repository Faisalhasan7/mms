<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorderDetailRequest extends FormRequest
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
            //

            'border_name' => 'required|string|max:255',
            'border_joining_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//            'mobile' => 'required|string|regex:/^(\+?\d{1,3}[-\s]?)?\(?\d{2,3}\)?[-\s]?\d{3}[-\s]?\d{4}$/',
            'mobile' => 'required',
            'email' => 'required|email|max:255',
            'father_name' => 'required|string|max:255',
            'father_mobile' => 'required',
            'village' => 'required|string|max:255',
            'post' => 'required|string|max:255',
            'thana' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'rent' => 'required|string|max:255',
            'advance' => 'required|string|max:255',
            'service' => 'required|string|max:255',
        ];
    }
}
