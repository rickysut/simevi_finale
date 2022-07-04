<?php

namespace App\Http\Requests;

use App\Models\DataPagu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataPaguRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_pagu_create');
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
            'amount' => [
                'required',
            ],
        ];
    }
}
