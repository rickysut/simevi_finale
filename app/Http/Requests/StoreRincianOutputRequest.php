<?php

namespace App\Http\Requests;

use App\Models\RincianOutput;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRincianOutputRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rincian_output_create');
    }

    public function rules()
    {
        return [
            'idoutp' => [
                'string',
                'required',
                'unique:rincian_outputs',
            ],
            'idoutp_1' => [
                'string',
                'required',
            ],
            'kdgiat' => [
                'string',
                'nullable',
            ],
            'kdoutput' => [
                'string',
                'nullable',
            ],
            'nmoutput' => [
                'string',
                'nullable',
            ],
            'sat' => [
                'string',
                'nullable',
            ],
            'kdsum' => [
                'string',
                'nullable',
            ],
            'thnawal' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'thnakhir' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kdmulti' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kdjnsout' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kdikk' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kdtema' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kdcttout' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'thang' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kdpn' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
