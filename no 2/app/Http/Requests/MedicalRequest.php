<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalRequest extends FormRequest
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
            'type' => ['required'],
            'value' => ['required_if:type,TEMPERATURE'],

            'systole' => ['required_if:type,BLOODPRESSURE'],
            'disatole' => ['required_if:type,BLOODPRESSURE'],

            'sleepStart' => ['required_if:type,SLEEP', 'date_format:H:i'],
            'sleepEnd' => ['required_if:type,SLEEP', 'date_format:H:i'],
            'deepSleep' => ['required_if:type,SLEEP'],
            'lightSleep' => ['required_if:type,SLEEP'],
            'wakeTime' => ['required_if:type,SLEEP'],

            'method' => ['required'],
            'diagnosis' => ['required'],
            'note' => ['required'],
            'mime_type' => ['required']
        ];
    }
}
