<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveAppointement extends FormRequest
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
            //
             'whitening' => 'nullable',
            'cleaning' => 'nullable',
            'brackets' => 'nullable',
            'anesthetic'=>'nullable',
            'name' => 'required|max:20',
            'email'=> 'nullable|email',
            'date'=> 'required|max:50',
            'time'=> 'required',
            'phone' => 'required|max:13'
        ];
    }
}
