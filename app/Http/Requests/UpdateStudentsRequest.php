<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'txtname' => 'required',
            'txtgender' => 'required',
            'txtemail' => [
                'required',
                Rule::unique('students','emailaddress')->ignore($this->txtid,'idstudents'),
                'email'
                // Rule::unique('students','emailaddress')->ignore($this->txtid,'idstudents'),
                // 'email'
            ],
            'txtphone' => 'required',
            'txtaddress' => 'required'

        ];
    }
    // notif validasi
    public function messages():array
    {
        return [
            'txtemail.unique' => 'Email telah terdaftar',   
            'txtname.required' => 'your name tidak boleh kosong'
        ];
    }
    // menambahkan attribut
    public function attributes():array
    {
        return[
            
        ];
    }
}
