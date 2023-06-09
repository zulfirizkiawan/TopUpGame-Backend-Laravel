<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'gameName' => 'required',
            'category' => 'required',
            'nominal_id' => 'required',
            'status' => 'required',
            'gamePhotoPath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
