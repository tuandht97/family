<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NodeRequest extends FormRequest
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
            'fullname' => 'required|string|max:191',
            'image' => 'nullable|string', 
            'email' => 'nullable|string|email', 
            'phone' => 'nullable|digits_between:10,11', 
            'sex' => 'nullable|boolean', 
            'birthday' => 'nullable', 
            'birthplace' => 'nullable|max:191', 
            'is_alive' => 'boolean', 
            'address' => 'nullable|string|max:191', 
            'death_date' => 'nullable', 
            'cause_of_death' => 'nullable|string', 
            'burial_place' => 'nullable|string|max:191', 
            'biography' => 'nullable|string', 
            'father' => 'nullable', 
            'mother' => 'nullable', 
            'level' => 'nullable',
        ];
    }
}
