<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreNoticeRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'content' => ['required', 'max:2048'],
            'notice_date' => ['required', 'date', 'date_format:Y-m-d'],
            'cover_image_upload' => ['required', 'mimes:jpg,png', 'max:10240'],
            'file_upload' => ['required', 'mimes:jpg,png,docx,pdf', 'max:55296'],
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
