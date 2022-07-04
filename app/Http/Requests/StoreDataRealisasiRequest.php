<?php

namespace App\Http\Requests;

use App\Models\DataRealisasi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataRealisasiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_realisasi_create');
    }

    public function rules()
    {
        return [
            'kdsatker' => [
                'string',
                'required',
            ],
            'ba' => [
                'string',
                'nullable',
            ],
            'baes_1' => [
                'string',
                'nullable',
            ],
            'akun' => [
                'string',
                'nullable',
            ],
            'program' => [
                'string',
                'nullable',
            ],
            'kegiatan' => [
                'string',
                'nullable',
            ],
            'output' => [
                'string',
                'nullable',
            ],
            'kewenangan' => [
                'string',
                'nullable',
            ],
            'sumber_dana' => [
                'string',
                'nullable',
            ],
            'cara_tarik' => [
                'string',
                'nullable',
            ],
            'kdregister' => [
                'string',
                'nullable',
            ],
            'lokasi' => [
                'string',
                'nullable',
            ],
            'budget_type' => [
                'string',
                'nullable',
            ],
            'tanggal' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'string',
                'nullable',
            ],
        ];
    }
}
