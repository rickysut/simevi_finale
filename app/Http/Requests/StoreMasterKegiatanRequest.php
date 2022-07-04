<?php

namespace App\Http\Requests;

use App\Models\MasterKegiatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMasterKegiatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('master_kegiatan_create');
    }

    public function rules()
    {
        return [
            'kddept' => [
                'string',
                'nullable',
            ],
            'kdunit' => [
                'string',
                'nullable',
            ],
            'kd_kegiatan' => [
                'string',
                'nullable',
            ],
            'direktorat' => [
                'string',
                'nullable',
            ],
            'nomenklatur_giat' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}