<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'title' => ['sometimes', 'required', 'max:255'],
            'venue' => ['sometimes', 'required', 'max:255'],
            'content' => ['sometimes', 'required', 'max:2048'],
            'start_date' => ['sometimes', 'required', 'date', 'date_format:Y-m-d'],
            'end_date' => ['sometimes', 'required', 'date', 'date_format:Y-m-d', 'after_or_equal:start_date'],
        ];
    }

    public function prepareForValidation()
    {
        if ($this->start_date && $this->end_date) {
            $start_date = date_format(date_create($this->start_date), 'Y-m-d');
            $end_date = date_format(date_create($this->end_date), 'Y-m-d');

            $this->merge([
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);
        }
    }
}
