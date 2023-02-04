<?php

namespace App\Http\Requests;

use App\Models\Contest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $contest = Contest::where('uuid', $this->route('id'))->first();

        return $contest && $this->user()->can('update', $contest);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:contests,name',
            'description' => 'required|string|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
        ];
    }
}
