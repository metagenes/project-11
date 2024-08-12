<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class KipRequest extends FormRequest
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
            'peserta_didik_id'                  => ['required','string','max:64'],
            'sekolah_id'                        => ['required','string','max:64'],
            'npsn'                              => ['required','digits:8'],
            'nomenklatur'                       => ['required','string', 'max:64'],
            'rombel_id'                         => ['nullable','numeric'],
            'nama_pd'                           => ['required','string','max:64'],
            'nama_ibu'                          => ['nullable','string','max:64'],
            'nama_ayah'                         => ['nullable','string','max:64'],
            'tanggal_lahir'                     => ['required','date','before:now'],
            'tempat_lahir'                      => ['required','string','max:32'],
            'nisn'                              => ['required','digits:10'],
            'jenis_kelamin'                     => ['required','numeric'],
            'nominal'                           => ['required','integer'],
            'no_rekening'                       => ['required','string','max:32'],
            'tahap_id'                          => ['required','integer'],
            'nomor_sk'                          => ['required','string','max:32'],
            'tanggal_sk'                        => ['required','date'],
            'nama_rekening'                     => ['nullable','string','max:64'],
            'tanggal_cair'                      => ['nullable','date'],
            'status_cair'                       => ['required','numeric'],
            'no_kip'                            => ['nullable','string','max:16'],
            'no_kks'                            => ['nullable','string','max:32'],
            'no_kps'                            => ['nullable','string','max:32'],
            'virtual_acc'                       => ['required','string','max:32'],
            'nama_kartu'                        => ['nullable','string','max:64'],
            'semester_id'                       => ['required','integer'],
            'layak_pip'                         => ['required','numeric'],
            'keterangan_pencairan'              => ['nullable','string'],
            'confirmation_text'                 => ['nullable','string'],
            'tahap_keterangan'                  => ['nullable','string'],
        ];

        return $rules;
       
    }
}
