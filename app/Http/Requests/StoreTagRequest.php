<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreTagRequest extends FormRequest
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
    public function rules()
    {
        return [
            'label' => [
                'required',
                Rule::unique('tags')->where(function ($query) {
                    $query->where('user_id', Auth::user()->id)
                        ->where('id', '!=', isset($this->id) ? $this->id : null);
                }),
                'string',
            ],
            'id' => [
                'sometimes|exists:tags,id',
            ],
            'color' => 'string|regex:/\#[A-Ga-g0-9]{6}/',
        ];
    }
}
