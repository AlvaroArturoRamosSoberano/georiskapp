<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeographicDetailStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            "latitude"=>"required|unique:geographic_details,latitude",
            "longitude"=>"required|unique:geographic_details,longitude"
        ];
    }
}
