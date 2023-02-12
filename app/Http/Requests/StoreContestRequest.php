<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:contests,name',
            'description' => 'required|string|max:1000',
            'submission_start_date' => 'required|date',
            'submission_end_date' => 'nullable|date|after:submission_start_date',
            'vote_start_date' => 'nullable|date',
            'vote_end_date' => 'nullable|date|after:vote_start_date',
            'cover_image' => 'nullable|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
