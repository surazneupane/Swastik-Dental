<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterAppointmentRequest extends FormRequest
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
            $starting_date = $this->request->get('starting_date');
            $ending_date = $this->request->get('ending_date');

            if($starting_date == null && $ending_date != null && $starting_date == null && $ending_date == null)
            {
                return[
                'starting_date' => 'required'
                 ];
            }

            dd($starting_date);

    }
}
