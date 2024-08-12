<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class KisehatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'id_dtks'                           => ['required','string','max:64'],
            'alamat'                            => ['nullable','string','max:191'],
            'noka_bpjs'                         => ['nullable','string','max:32'],
            'psnoka_bpjs'                       => ['nullable','string','max:32'],
            'kk'                                => ['required','digits:16'],
            'nik'                               => ['required','digits:16'],
            'nama'                              => ['required','string','max:64'],
            'jenis_kelamin'                     => ['required','numeric'],
            'tempat_lahir'                      => ['required','string','max:32'],
            'tanggal_lahir'                     => ['required','date','before:now'],
            'status_hubungan_dalam_keluarga_id' => ['required','numeric'],
            'dusun_id'                          => ['nullable','numeric'],
            'rts_id'                            => ['nullable','numeric'],
            'rws_id'                            => ['nullable','numeric'],
            'nama_ibu'                          => ['nullable','string','max:64'],
            'status'                            => ['required','string','max:64'],
            
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'rts.required' => 'RT wajib diisi',
            'rws.required' => 'RW wajib diisi',
            'status_hubungan_dalam_keluarga_id.required' => 'status hubungan dalam keluarga wajib diisi',
        ];
    }
}
