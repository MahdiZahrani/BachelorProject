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
            "user_id"  => "required|exists:users,id",
            "day"      => "required|in:sat,sun,mon,tue,thu,wed,fri",
            "from"     => "required|date_format:Y-m-d H:i:s",
            "to"       => "required|date_format:Y-m-d H:i:s"
        ];
    }
}
