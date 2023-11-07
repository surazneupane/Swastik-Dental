<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSliderRequest extends FormRequest
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
//        |dimensions:min_width=500,min_height=500
        return [
            'slider-image' =>'required|image|mimes:jpg,png,jpeg',
            'heading'=>'required|max:40',
            'description'=>'required|max:60'
        ];
    }
}
