<?php

namespace App\Http\Requests;

use App\Enums\AnswerTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreQuestionRequest extends FormRequest
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
            'text' => [
                'required',
                'string'
            ],
            'answer_type' => [
                'required',
                new Enum(AnswerTypes::class)
            ],
            'order'
        ];
    }
}
