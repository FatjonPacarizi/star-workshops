<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkshopRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'limited_participants' => 'nullable|numeric|gt:0',
            'country_id' => 'required',
            'type_id' => 'required',
            'city_id' => 'required',
            'category_id' => 'required',
            'filedlink' => 'required',
            'time' => 'required',
        ];
    }
}
