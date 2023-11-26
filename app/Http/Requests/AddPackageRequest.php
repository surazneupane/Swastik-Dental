<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddPackageRequest extends FormRequest
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
                        'package_type' => ['required','max:15'],
                        'price' => ['required','integer'],
                        'service_name_one' =>['required','max:20'],
                        'service_name_two' => ['nullable','max:20'],
                        'service_name_three' => ['nullable','max:20'],
                        'service_name_four' => ['nullable','max:20'],
                        'service_name_five' => ['nullable','max:20']
                    ];

    }
}
//Rule::unique('your_table_name')->where(function ($query) use ($request) {
//    return $query->where('package_type', $request->package_type);
//}),
