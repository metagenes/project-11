<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DTKSdRequest extends FormRequest
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
            'periode'                           => ['required', 'date',],
            'alamat'                            => ['nullable','string','max:191'],
            'kk'                                => ['required','digits:16'],
            'nik'                               => ['required','digits:16'],
            'nama'                              => ['required','string','max:64'],
            'jenis_kelamin'                     => ['required','numeric'],
            'dusun_id'                          => ['nullable','numeric'],
            'rts_id'                            => ['nullable','numeric'],
            'rws_id'                            => ['nullable','numeric'],
            'nama_ibu'                          => ['nullable','string','max:64'],
            'nama_ayah'                         => ['nullable','string','max:64'],
            
        ];
         

        return $rules;
    }

    public function messages()
    {
        return [
            'rts.required' => 'RT wajib diisi',
            'rws.required' => 'RW wajib diisi',
        ];
    }
}
