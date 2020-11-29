<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WishRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'cost_estimate' => ['required', 'numeric'],
            'item' => ['required', 'string'],
            'priority' => ['required', 'string'],
            'image' => ['nullable'],
            'pp_date' => ['nullable']
        ];
    }
}
