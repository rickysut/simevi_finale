<?php

namespace App\Http\Requests;

use App\Models\DataRenja;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataRenjaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_renja_create');
    }

    public function rules()
    {
        return [
            'thang' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kdjendok' => [
                'string',
                'nullable',
            ],
            'kdsatker' => [
                'string',
                'nullable',
            ],
            'kddept' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdunit' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdprogram' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdgiat' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdoutput' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdlokasi' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdkabkota' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kddekon' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdsoutput' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdkmpnen' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdskmpnen' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdakun' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdkppn' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdbeban' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdjnsban' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdctarik' => [
                'string',
                'max:10',
                'nullable',
            ],
            'register' => [
                'string',
                'nullable',
            ],
            'carahitung' => [
                'string',
                'max:10',
                'nullable',
            ],
            'header1' => [
                'string',
                'nullable',
            ],
            'header2' => [
                'string',
                'nullable',
            ],
            'kdheader' => [
                'string',
                'nullable',
            ],
            'noitem' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nmitem' => [
                'string',
                'nullable',
            ],
            'vol1' => [
                'numeric',
            ],
            'sat1' => [
                'string',
                'max:15',
                'nullable',
            ],
            'vol2' => [
                'numeric',
            ],
            'sat2' => [
                'string',
                'max:15',
                'nullable',
            ],
            'vol3' => [
                'numeric',
            ],
            'sat3' => [
                'string',
                'max:15',
                'nullable',
            ],
            'vol4' => [
                'numeric',
            ],
            'sat4' => [
                'string',
                'max:15',
                'nullable',
            ],
            'volkeg' => [
                'numeric',
            ],
            'satkeg' => [
                'string',
                'max:15',
                'nullable',
            ],
            'hargasat' => [
                'numeric',
            ],
            'jumlah' => [
                'numeric',
            ],
            'jumlah2' => [
                'numeric',
            ],
            'paguphln' => [
                'string',
                'max:10',
                'nullable',
            ],
            'pagurmp' => [
                'string',
                'max:10',
                'nullable',
            ],
            'pagurkp' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdblokir' => [
                'string',
                'max:10',
                'nullable',
            ],
            'blokirphln' => [
                'string',
                'max:10',
                'nullable',
            ],
            'blokirrmp' => [
                'string',
                'max:10',
                'nullable',
            ],
            'blokirrkp' => [
                'string',
                'max:10',
                'nullable',
            ],
            'rphblokir' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdcopy' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdabt' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdsbu' => [
                'string',
                'max:10',
                'nullable',
            ],
            'volsbk' => [
                'numeric',
            ],
            'volrkakl' => [
                'numeric',
            ],
            'blnkontrak' => [
                'string',
                'max:10',
                'nullable',
            ],
            'nokontrak' => [
                'string',
                'max:10',
                'nullable',
            ],
            'tgkontrak' => [
                'string',
                'nullable',
            ],
            'nilkontrak' => [
                'string',
                'max:10',
                'nullable',
            ],
            'januari' => [
                'string',
                'max:10',
                'nullable',
            ],
            'pebruari' => [
                'string',
                'max:10',
                'nullable',
            ],
            'maret' => [
                'string',
                'max:10',
                'nullable',
            ],
            'april' => [
                'string',
                'max:10',
                'nullable',
            ],
            'mei' => [
                'string',
                'max:10',
                'nullable',
            ],
            'juni' => [
                'string',
                'max:10',
                'nullable',
            ],
            'juli' => [
                'string',
                'max:10',
                'nullable',
            ],
            'agustus' => [
                'string',
                'max:10',
                'nullable',
            ],
            'september' => [
                'string',
                'max:10',
                'nullable',
            ],
            'oktober' => [
                'string',
                'max:10',
                'nullable',
            ],
            'nopember' => [
                'string',
                'max:10',
                'nullable',
            ],
            'desember' => [
                'string',
                'max:10',
                'nullable',
            ],
            'jmltunda' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdluncuran' => [
                'string',
                'max:10',
                'nullable',
            ],
            'jmlabt' => [
                'string',
                'max:10',
                'nullable',
            ],
            'norev' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kdubah' => [
                'string',
                'max:10',
                'nullable',
            ],
            'kurs' => [
                'numeric',
            ],
            'indexkpjm' => [
                'numeric',
            ],
            'kdib' => [
                'string',
                'max:10',
                'nullable',
            ],
        ];
    }
}
