<?php

namespace App\Http\Requests;

use App\Models\MasterKegiatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMasterKegiatanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('master_kegiatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:master_kegiatans,id',
        ];
    }
}