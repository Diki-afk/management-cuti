<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeavesRequest extends FormRequest
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
            'employee_id' => ['required'],
            'leave_date' => ['required', 'date'],
            'long_leave' => ['required', 'integer'],
            'description' => ['required']
        ];
    }

    /**
     * @return [type]
     * change attribute input for warning message
     */
    public function attributes()
    {
        return [
            'employee_id' => 'Nomor Induk',
            'leave_date' => 'Tanggal Cuti',
            'long_leave' => 'Lama Cuti',
            'description' => 'Keterangan',
        ];
    }

    /**
     * @return [type]
     * change message warning based on rules
     */
    public function messages()
    {
        return [
            'employee_id.required' => 'Nomor Induk Karyawan Belum dipilih',
            'leave_date.required' => 'Tanggal Cuti Karyawan Belum Diisi',
            'long_leave.required' => 'Lama Cuti Karyawan Belum Diisi',
            'description.required' => 'keterangan Cuti Karyawan Belum Diisi',
        ];
    }
}
