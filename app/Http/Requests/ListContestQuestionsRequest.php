<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListContestQuestionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

        return $this->contest && $this->user()->can('view', $this->contest);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
