<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
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
            "day"      => "required|in:sat,sun,mon,tue,thu,wed,fri",
            "start"     => "required|date_format:H:i",
            "end"       => "required|date_format:H:i"
        ];
    }
}
