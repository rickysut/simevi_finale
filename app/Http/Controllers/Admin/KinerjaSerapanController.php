<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataRealisasi;
use App\Models\Satker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB; 
use Yajra\DataTables\Facades\DataTables;

class KinerjaSerapanController extends Controller
{
    
    public function index(Request $request)
    {
        abort_if(Gate::denies('kinerja_serapan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        $dtSatker = ($request->dtSatker??'');
        $dtYear = ($request->dtYear??'');
        
        if (($dtYear == '')||($dtYear == '0')){
            $qry = 'select max(YEAR(STR_TO_DATE(tanggal,"%d/%m/%Y"))) as year from data_realisasis';
            $Year = DB::select(DB::raw($qry));
            $qryByYear = ' and globaldata.tahun = '. $Year[0]->year;  
        } else {
            $qryByYear = ' and globaldata.tahun = '. $dtYear;
        } 


        if (($dtSatker == '')||($dtSatker == '0')){
            $qryBySatker = '';    
        } else {
            $qryBySatker = ' and globaldata.kd_satker = "'. $dtSatker .'"';
        } 

        $str = 'select globaldata.tahun, globaldata.kd_satker, globaldata.nm_satker, sum(dp.amount) as total,  globaldata.kwn4, format((((globaldata.amount1 / sum(dp.amount)))/0.15)*100,2) as amnt1 , globaldata.kwn2, format((((globaldata.amount2 / sum(dp.amount)))/0.40)*100,2) as amnt2, globaldata.kwn3, format((((globaldata.amount3 / sum(dp.amount)))/0.60)*100,2) as amnt3, globaldata.kwn4, format((globaldata.amount4 / sum(dp.amount))*100,2) as amnt4
        FROM
        (		
            /*KP*/
                select  tabdata3.tahun, tabdata3.kd_satker, tabdata3.nm_satker, max(tabdata3.kwn1) kwn1, sum(tabdata3.amount1) as amount1, max(tabdata3.kwn2) kwn2, sum(tabdata3.amount2) as amount2, max(tabdata3.kwn3) kwn3, sum(tabdata3.amount3) as amount3, max(tabdata3.kwn4) kwn4, sum(tabdata3.amount4) as amount4
                from
                (
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, kwn.nam as kwn1,  Sum(data_realisasis.amount) AS amount1,  null as kwn2, null as amount2, null as kwn3, null as amount3, null as kwn4, null as amount4
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 4) and kwn.kode=1
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
        
                UNION ALL
        
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, null as kwn1, null as amount1, kwn.nam as kwn2,  Sum(data_realisasis.amount) AS amount2,  null as kwn3, null as amount3, null as kwn4, null as amount4
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 7) and kwn.kode=1
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
        
                UNION ALL
        
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, null as kwn1, null as amount1,  null as kwn2, null as amount2,  kwn.nam as kwn3,  Sum(data_realisasis.amount) AS amount3,  null as kwn4, null as amount4
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 10) and kwn.kode=1
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
        
                UNION ALL
        
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, null as kwn1, null as amount1,  null as kwn2, null as amount2,  null as kwn3, null as amount3, kwn.nam as kwn4,  Sum(data_realisasis.amount) AS amount4  
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) <= 12) and kwn.kode=1
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
                ) as tabdata3 
                GROUP BY tabdata3.kd_satker
                
                UNION ALL
                /*DK*/
                select  tabdata.tahun, tabdata.kd_satker, tabdata.nm_satker, max(tabdata.kwn1) kwn1, sum(tabdata.amount1) as amount1, max(tabdata.kwn2) kwn2, sum(tabdata.amount2) as amount2, max(tabdata.kwn3) kwn3, sum(tabdata.amount3) as amount3, max(tabdata.kwn4) kwn4, sum(tabdata.amount4) as amount4
                from
                (
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, kwn.nam as kwn1,  Sum(data_realisasis.amount) AS amount1,  null as kwn2, null as amount2, null as kwn3, null as amount3, null as kwn4, null as amount4
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 4) and kwn.kode=3
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
        
                UNION ALL
        
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, null as kwn1, null as amount1, kwn.nam as kwn2,  Sum(data_realisasis.amount) AS amount2,  null as kwn3, null as amount3, null as kwn4, null as amount4
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 7) and kwn.kode=3
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
        
                UNION ALL
        
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, null as kwn1, null as amount1,  null as kwn2, null as amount2,  kwn.nam as kwn3,  Sum(data_realisasis.amount) AS amount3,  null as kwn4, null as amount4
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 10) and kwn.kode=3
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
        
                UNION ALL
        
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, null as kwn1, null as amount1,  null as kwn2, null as amount2,  null as kwn3, null as amount3, kwn.nam as kwn4,  Sum(data_realisasis.amount) AS amount4  
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) <= 12) and kwn.kode=3
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
                ) as tabdata 
                GROUP BY tabdata.kd_satker
                
                UNION ALL
            /*TP*/
                select  tabdata2.tahun, tabdata2.kd_satker, tabdata2.nm_satker, max(tabdata2.kwn1) kwn1, sum(tabdata2.amount1) as amount1, max(tabdata2.kwn2) kwn2, sum(tabdata2.amount2) as amount2, max(tabdata2.kwn3) kwn3, sum(tabdata2.amount3) as amount3, max(tabdata2.kwn4) kwn4, sum(tabdata2.amount4) as amount4
                from
                (
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, kwn.nam as kwn1,  Sum(data_realisasis.amount) AS amount1,  null as kwn2, null as amount2, null as kwn3, null as amount3, null as kwn4, null as amount4
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 4) and kwn.kode=4
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
        
                UNION ALL
        
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, null as kwn1, null as amount1, kwn.nam as kwn2,  Sum(data_realisasis.amount) AS amount2,  null as kwn3, null as amount3, null as kwn4, null as amount4
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 7) and kwn.kode=4
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
        
                UNION ALL
        
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, null as kwn1, null as amount1,  null as kwn2, null as amount2,  kwn.nam as kwn3,  Sum(data_realisasis.amount) AS amount3,  null as kwn4, null as amount4
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 10) and kwn.kode=4
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
        
                UNION ALL
        
                SELECT  data_realisasis.tahun, satkers.kd_satker, satkers.nm_satker, null as kwn1, null as amount1,  null as kwn2, null as amount2,  null as kwn3, null as amount3, kwn.nam as kwn4,  Sum(data_realisasis.amount) AS amount4  
                FROM data_realisasis 
                INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker 
                INNER JOIN kd_kwn kwn ON kwn.kode = data_realisasis.kewenangan and (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) <= 12) and kwn.kode=4
                GROUP BY satkers.kd_satker, satkers.nm_satker, data_realisasis.kewenangan, data_realisasis.tahun
                ) as tabdata2 
                GROUP BY tabdata2.kd_satker
        ) as globaldata	
        inner JOIN data_pagus dp on dp.kdsatker = globaldata.kd_satker '.$qryByYear.$qryBySatker.' 
        GROUP BY globaldata.kd_satker
        ORDER BY globaldata.kd_satker
        ';
        
        $query = DB::select(DB::raw($str));
        $table = Datatables::of($query);

        $table->editColumn('kd_satker', function ($row) {
            return $row->kd_satker ? $row->kd_satker : '';
        });
        $table->editColumn('nama', function ($row) {
            return $row->nm_satker ? $row->nm_satker : '';
        });
        $table->editColumn('kwn4', function ($row) {
            return $row->kwn4 ? $row->kwn4 : '';
        });
        $table->editColumn('amnt1', function ($row) {
            return $row->amnt1 ? $row->amnt1 : '-';
        });
        $table->editColumn('amnt2', function ($row) {
            return $row->amnt2 ? $row->amnt2 : '-';
        });
        $table->editColumn('amnt3', function ($row) {
            return $row->amnt3 ? $row->amnt3 : '-';
        });
        $table->editColumn('amnt4', function ($row) {
            return $row->amnt4 ? $row->amnt4 : '-';
        });
        
        
        $table->rawColumns([]);
        $stable = $table->make(true);

        $breadcrumb = 'Nilai Kinerja Percepatan (NKP) Satker';
        

        if (($dtYear != '')&&($dtYear != '0')){
            $breadcrumb = $breadcrumb . ' TA ' . $dtYear;    
        }
        $qry = 'select distinct(YEAR(STR_TO_DATE(tanggal,"%d/%m/%Y"))) as year from data_realisasis';
        $years = DB::select(DB::raw($qry));
        if ($dtYear == ''){
            $qry = 'select max(YEAR(STR_TO_DATE(tanggal,"%d/%m/%Y"))) as year from data_realisasis';
            $Year = DB::select(DB::raw($qry));
            $dtYear = $Year[0]->year; 
        }
        $satkers = Satker::distinct()->where('kwn', '!=', 'NULL')->get(['kd_satker', 'nm_satker']); 
        return view('admin.detailserapan.index', compact('breadcrumb', 'stable', 'years', 'dtYear', 'dtSatker', 'satkers'));
    }

    
}
