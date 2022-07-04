<?php

namespace App\Http\Requests;

use App\Models\RincianOutput;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRincianOutputRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('rincian_output_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:rincian_outputs,id',
        ];
    }
}
