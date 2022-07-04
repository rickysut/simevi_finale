<?php

namespace App\Http\Requests;

use App\Models\DataPagu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDataPaguRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('data_pagu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:data_pagus,id',
        ];
    }
}
