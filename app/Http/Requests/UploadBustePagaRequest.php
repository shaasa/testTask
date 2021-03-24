<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadBustePagaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array{
        return [
            'mese'       => 'required|integer|min:1|max:12',
            'anno'       => 'required|integer',
            'customFile' => 'required|mimes:pdf|max:2000'
        ];
    }
}
