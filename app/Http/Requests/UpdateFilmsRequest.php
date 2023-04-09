<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'namafilm' => 'required',
            'durasi' => 'required',
            'genre' => 'required',
            'sutradara' => 'required',
            // 'required|image|mimes:jpg,png,jpeg,gif,svg'
            'sinopsis' => 'required'
        ];
    }
    public function messages(): array
    {
    return [
        'unique' => ':attribute Sudah ada di dalam tabel',
        'namafilm.required' => ':Nama Film Tidak Boleh Kosong',
        'durasi.required' => ':Durasi Tidak Boleh Kosong',
        'genre.required' => ':Genre Tidak Boleh Kosong',
        'sutradara.required' => ':Sutradara Tidak Boleh Kosong',
        'sinopsis.required' => ':Sinopsis Tidak Boleh Kosong'
    ];
    }

    public function attributes(): array
    {
        return[
        'namafilm' => 'namafilm'
        ];
    }

}
