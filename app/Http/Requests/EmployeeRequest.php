<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'identification_number' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'join_date' => ['required', 'date'],
            'address' => ['required']
        ];
    }

    /**
     * @return [type]
     * change attribute input for warning message
     */
    public function attributes()
    {
        return [
            'identification_number' => 'Nomor Induk',
            'name' => 'Nama Karyawan',
            'date_of_birth' => 'Tanggal Lahir',
            'join_date' => 'Tanggal Bergabung',
            'address' => 'Alamat'
        ];
    }
    
    /**
     * @return [type]
     * change message warning based on rules
     */
    public function messages()
    {
        return [
            'identification_number.required' => 'Nomor Induk Belum Diisi',
            'identification_number.max' => 'Melebihi Panjang Maksimal 255 Karakter',
            'name.required' => 'Nama Karyawan Belum Diisi',
            'name.max' => 'Melebihi Panjang Maksimal 255 Karakter',
            'date_of_birth.required' => 'Tanggal Lahir Belum Diisi',
            'join_date.required' => 'Tanggal Bergabung Belum Diisi',
            'address.required' => 'Alamat Belum Diisi'
        ];
    }
}
