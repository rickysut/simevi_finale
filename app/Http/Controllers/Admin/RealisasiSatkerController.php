<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Satker;
use App\Models\DataRealisasi;
use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB; 
use Yajra\DataTables\Facades\DataTables;


class RealisasiSatkerController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('realisasi_satker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dtSatker = ($request->dtSatker ?? '');
        $dtDate = ($request->dtDate ?? '');
        $dtMaxYear = DataRealisasi::max('tahun');
        $dtYear = '';
        
        $qrySatker = '';
        if ($dtSatker != ''){
            $qrySatker = ' and tabdata.kd_satker = "' .$dtSatker .'"';
        } 

        $qryDate = '';
        if ($dtDate != ''){
            $dtYear = substr($dtDate,6);
            $qryYear = ' where tabdata.tahun = YEAR(STR_TO_DATE("'. $dtDate . '", "%d/%m/%Y"))'; 
            $qryDate = ' and STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y") <=  STR_TO_DATE("'. $dtDate . '", "%d/%m/%Y")' ;
        } else {
            $dtYear = $dtMaxYear;
            //$dtDate = Carbon::today('Asia/Jakarta')->isoFormat('DD/MM/YYYY');
            $dtDate = DataRealisasi::max('tanggal');
            $qryYear = ' where tabdata.tahun = ' . $dtMaxYear; 
            $qryDate = ' and STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y") <= STR_TO_DATE("'. $dtDate .'", "%d/%m/%Y") ';
        }

        $str = 'select tabdata.tahun, "'. $dtDate .'" as tanggal, tabdata.kd_satker, tabdata.nm_satker, format(GROUP_CONCAT(tabdata.pagu),0) as pagu, format(GROUP_CONCAT(tabdata.realisasi),0) as realisasi , FORMAT(sum(tabdata.realisasi)/sum(tabdata.pagu)*100,2) nilai
        FROM
        (
        SELECT data_pagus.tahun, satkers.kd_satker, satkers.nm_satker,  Sum(data_pagus.amount) AS pagu, null as realisasi 
        FROM satkers JOIN data_pagus ON satkers.kd_satker = data_pagus.kdsatker
        GROUP BY satkers.kd_satker, satkers.nm_satker,   data_pagus.tahun
        union all
        SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker,  null as pagu,  Sum(data_realisasis.amount) AS realisasi
        FROM data_realisasis JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker '.$qryDate.'
        GROUP BY satkers.kd_satker, satkers.nm_satker,  data_realisasis.tahun
        ) as tabdata
        '.$qryYear.$qrySatker.'
        GROUP BY tabdata.kd_satker,tabdata.nm_satker, tabdata.tahun
        ORDER BY tabdata.tahun, tabdata.kd_satker
        ';
        
        $query = DB::select(DB::raw($str));
        //dd($query);
        $dettable = Datatables::of($query);
            
        $dettable->addColumn('actions', '&nbsp;');

        $dettable->editColumn('actions', function ($row) {
            
            $viewGate = 'realisasi_satker_show';
            $crudRoutePart = 'realisasisatker';
            return view('partials.detailSatkerAction', compact(
            'viewGate',
            'crudRoutePart',
            'row'
            
        ));
        });

        $dettable->editColumn('tahun', function ($row) {
            return $row->tahun ? $row->tahun : '';
        });
        $dettable->editColumn('tanggal', function ($row) {
            return $row->tanggal ? $row->tanggal : '';
        });
        $dettable->editColumn('kd_satker', function ($row) {
            return $row->kd_satker ? $row->kd_satker : '';
        });
        $dettable->editColumn('nm_satker', function ($row) {
            return $row->nm_satker ? $row->nm_satker : '';
        });
        $dettable->editColumn('pagu', function ($row) {
            return $row->pagu ? $row->pagu : 0;
        });
        $dettable->editColumn('realisasi', function ($row) {
            return $row->realisasi ? $row->realisasi : 0;
        });
        $dettable->editColumn('nilai', function ($row) {
            return $row->nilai ? $row->nilai : 0;
        });
        
        
        
        $dettable->rawColumns(['actions']);
        $stable = $dettable->make(true);
        //dd($stable);
        $satkers = Satker::distinct()->where('kwn', '!=', 'NULL')->get(['kd_satker', 'nm_satker']); 
        $breadcrumb = trans('cruds.realisasiSatker.title_singular') . ' T.A ' . $dtYear ;
        return view('admin.realisasiSatkers.index', compact('breadcrumb', 'satkers', 'dtSatker', 'dtDate', 'stable'));


    }

    public function show(Request $request)
    {
        abort_if(Gate::denies('realisasi_satker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dtSatker = ($request->route('kdsatker')??'');
        $dtYear = ($request->route('tahun')??'');
        $dtTanggal = ($request->route('tanggal')??'');
        $nm_satker = Satker::where('kd_satker', $dtSatker)->get('nm_satker');
        $breadcrumb = 'Realisasi Per Program Per Kegiatan Per KRO TA ' . $dtYear ;


        $str = '
        select tabdata.tahun as id,  tabdata.kode, tabdata.uraian,  format(GROUP_CONCAT(tabdata.pagu),0) as pagu, format(GROUP_CONCAT(tabdata.realisasi),0) as realisasi , FORMAT(sum(tabdata.realisasi)/sum(tabdata.pagu)*100,2) nilai
        FROM
        (

        SELECT data_pagus.tahun,satkers.kd_satker, CONCAT(data_pagus.program,".",data_pagus.kegiatan,".",data_pagus.output) as kode, kro.nama_kro as uraian, Sum(data_pagus.amount) AS pagu, null as realisasi 
        FROM satkers JOIN data_pagus ON satkers.kd_satker = data_pagus.kdsatker
        INNER JOIN tbl_kro kro on kro.kd_kegiatan = data_pagus.kegiatan and kro.kd_kro = data_pagus.output  
        GROUP BY data_pagus.kdsatker,  data_pagus.program, data_pagus.kegiatan, data_pagus.output, data_pagus.tahun

        union all

        SELECT  data_realisasis.tahun, satkers.kd_satker, CONCAT(data_realisasis.program,".",data_realisasis.kegiatan,".",data_realisasis.output) as kode, kro.nama_kro as uraian, null as pagu,  Sum(data_realisasis.amount) AS realisasi
        FROM data_realisasis JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker and STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y") <=  STR_TO_DATE("'.$dtTanggal.'", "%d-%m-%Y")
        INNER JOIN tbl_kro kro on kro.kd_kegiatan = data_realisasis.kegiatan and kro.kd_kro = data_realisasis.output 
        GROUP BY data_realisasis.kdsatker,  data_realisasis.program, data_realisasis.kegiatan, data_realisasis.output, data_realisasis.tahun

        ) as tabdata
        where tabdata.tahun = YEAR(STR_TO_DATE("'.$dtTanggal.'", "%d-%m-%Y")) and tabdata.kd_satker = "'.$dtSatker.'"
        GROUP BY tabdata.kd_satker, tabdata.kode, tabdata.tahun
        ORDER BY tabdata.kd_satker, tabdata.tahun, tabdata.kd_satker;
        ';

        
        $query = DB::select(DB::raw($str));
        $dettable = Datatables::of($query);
            
        

        $dettable->editColumn('id', function ($row) {
            return $row->id ? $row->id : '';
        });
        $dettable->editColumn('kode', function ($row) {
            return $row->kode ? $row->kode : '';
        });
        $dettable->editColumn('uraian', function ($row) {
            return $row->uraian ? $row->uraian : '';
        });
        $dettable->editColumn('pagu', function ($row) {
            return $row->pagu ? $row->pagu : 0;
        });
        $dettable->editColumn('realisasi', function ($row) {
            return $row->realisasi ? $row->realisasi : 0;
        });
        $dettable->editColumn('nilai', function ($row) {
            return $row->nilai ? $row->nilai : 0;
        });
        
        $dettable->rawColumns([]);
        $stable = $dettable->make(true);
        //dd($stable);
        return view('admin.realisasiSatkers.show', compact('breadcrumb','dtSatker', 'nm_satker', 'stable'));

    }
}
