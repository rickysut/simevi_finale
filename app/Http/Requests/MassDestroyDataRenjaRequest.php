<?php

namespace App\Http\Requests;

use App\Models\DataRenja;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDataRenjaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('data_renja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:data_renjas,id',
        ];
    }
}
