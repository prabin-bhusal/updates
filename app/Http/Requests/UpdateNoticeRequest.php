<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoticeRequest extends FormRequest
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
            'title' => ['sometimes', 'max:255'],
            'content' => ['sometimes', 'max:2048'],
            'notice_date' => ['sometimes', 'date', 'date_format:Y-m-d'],
            'cover_image_upload' => ['sometimes', 'mimes:jpg,png', 'max:10240'],
            'file_upload' => ['sometimes', 'mimes:jpg,png,docx,pdf', 'max:55296'],
        ];
    }

    public function prepareForValidation()
    {
        $notice_date = date_format(date_create($this->notice_date), 'Y-m-d');
        
        $this->merge([
            'notice_date' => $notice_date,
        ]);
    }
}
