<?php

namespace App\Http\Requests;

use App\Models\BackdateBanpem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBackdateBanpemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('backdate_banpem_create');
    }

    public function rules()
    {
        return [
            'year' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kd_satker' => [
                'string',
                'nullable',
            ],
            'provinsi' => [
                'string',
                'nullable',
            ],
            'kab_kota' => [
                'string',
                'nullable',
            ],
            'nm_gapoktan' => [
                'string',
                'nullable',
            ],
            'nm_barang' => [
                'string',
                'nullable',
            ],
            'nominal' => [
                'numeric',
            ],
            'kd_giat' => [
                'string',
                'nullable',
            ],
            'kd_akun' => [
                'string',
                'nullable',
            ],
            'kwn' => [
                'string',
                'nullable',
            ],
        ];
    }
}
