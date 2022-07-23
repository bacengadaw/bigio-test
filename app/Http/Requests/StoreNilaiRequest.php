<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNilaiRequest extends FormRequest
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
            'user_id' => 'required',
            'nilai' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Data user wajib diisi',
            'nilai.required' => 'nilai wajib diisi',
        ];
    }
}
