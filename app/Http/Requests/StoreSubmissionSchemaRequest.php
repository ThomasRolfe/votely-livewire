<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionSchemaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->contest && $this->user()->can('update', $this->contest);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'field_type_id' => 'required|exists:field_types,id',
            'label' => 'required|string',
            'required' => 'nullable|boolean',
            'meta' => 'nullable|array',
            'meta.*.key' => 'required|string',
            'meta.*.value' => 'required|alpha_num',
            'order' => 'nullable|numeric',
            'options' => 'nullable|array',
            'options.*value' => 'string',
            'show_in_preview' => 'nullable|boolean',
            'visible_to_voters' => 'nullable|boolean',
        ];
    }
}
