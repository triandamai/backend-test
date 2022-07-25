<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\TypeSetting;

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
            'member_id'     => ['required'],
            'nurse_id'      => ['required'],
            'type'          => ['required', new TypeSetting()],
            'value'         => ['required_if:type,TEMPERATURE'],    
            'method'        => ['required'],
            'diagnosis'     => ['required'],
            'note'          => ['required'],
            'mime_type'     => ['required'],
            // blood validation
            'systole'       => ['required_if:type,BLOODPRESSURE'],
            'disatole'      => ['required_if:type,BLOODPRESSURE'],
            // sleep validation
            'sleepStart'    => ['required_if:type,SLEEP', 'date_format:H:i'],
            'sleepEnd'      => ['required_if:type,SLEEP', 'date_format:H:i', 'after:sleepStart'],
            'deepSleep'     => ['required_if:type,SLEEP'],
            'lightSleep'    => ['required_if:type,SLEEP'],
            'wakeTime'      => ['required_if:type,SLEEP']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true
        ], 422));
    }
}
