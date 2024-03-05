<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
            'txtid' => 'required |unique:students,idstudents|min:7|max:7',
            'txtname' => 'required',
            'txtgender' => 'required',
            'txtemail' => 'required |email|unique:students,emailaddress',
            'txtphone' => 'required',
            'txtaddress' => 'required'

        ];
    }
    // notif validasi
    public function messages():array
    {
        return [
            'txtid.required' => ':attribute not allowed kosong',
            'txtid.unique' => 'Id Syudah Ada',   
            'txtemail.unique' => 'Email telah terdaftar',   
            'txtname.required' => 'your name tidak boleh kosong'
        ];
    }
    // menambahkan attribut
    public function attributes():array
    {
        return[
            'txtid' => 'NIM'
        ];
    }
}
