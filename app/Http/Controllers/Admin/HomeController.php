<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Belanja;
use App\Models\DataRenja;
use App\Models\DataPagu;
use App\Models\DataRealisasi;
use App\Models\BackdateBanpem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {   
        if (Gate::allows('dashboard_access')){
            $breadcrumb = trans('cruds.dashboard.title_singular');
            return view('landing', compact('breadcrumb'));
        } else {
            if (Gate::allows('dashboardvip_access')){
                return $this->vip($request);
            }
        }
    
    }

    /**
     * Set locale.
     *
     * void
     */
    public function adminSetLocale(Request $request)
    {
       
        session()->put('language', request('lang'));
        
        //return redirect(url());
        return response(app()->getLocale());
    }
    /**
     * Show vip summary.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function vip(Request $request)
    {
        
        $agent = new Agent();

        //chart Renja
        //$sumyears = DataRenja::select(DB::raw('thang, SUM(jumlah) as totaljum'))->groupBy('thang')->offset(0)->limit(4)->orderBy('thang', 'DESC')->get();
        //end chart renja

        //chart (kinerja anggaran)
        $str = 'SELECT tabdata.tahun, GROUP_CONCAT(tabdata.totalpagu) as pagu, GROUP_CONCAT(tabdata.totalrealisasi) as realisasi FROM
                (
                select p.tahun, sum(p.amount) as totalpagu, null as totalrealisasi
                FROM data_pagus p 
                GROUP BY p.tahun
                union all
                select r.tahun, null as totalpagu, sum(r.amount) as totalrealisasi
                from data_realisasis r
                GROUP BY r.tahun
                ) as tabdata 
                GROUP BY tabdata.tahun';
        $prData = DB::select(DB::raw($str));
        //end chart (kinerja anggaran)
        
        //chart belanja 526
        $banpemyear = BackdateBanpem::select(DB::raw('year, SUM(nominal) as total'))->groupBy('year')->offset(0)->limit(4)->orderBy('year', 'DESC')->get();
        $databanpem = BackdateBanpem::select(DB::raw('year, kwn, format(SUM(nominal)/1000000000,2) as total'))->groupBy(['year', 'kwn'])->orderBy('kwn', 'asc')->get();
        
        $str = 'SELECT tabdata.tahun, FORMAT(GROUP_CONCAT(tabdata.totalpagu),0) as pagu, FORMAT(GROUP_CONCAT(tabdata.totalrealisasi),0) as realisasi ,
        FORMAT((GROUP_CONCAT(tabdata.totalrealisasi)/GROUP_CONCAT(tabdata.totalpagu))*100,2) as nilai
        FROM
        (
        select p.tahun,  sum(p.amount) as totalpagu, null as totalrealisasi
        FROM data_pagus p 
        where SUBSTR(p.akun, 1, 3) = "526"
        GROUP BY p.tahun
        
        union ALL
        
        select b.`year`, null as totalpagu,  sum(b.nominal) as totalrealisasi
        FROM backdate_banpems b
        GROUP BY b.year
        
        ) as tabdata 
        
        GROUP BY tabdata.tahun';
        $pbData = DB::select(DB::raw($str));

        $dtYear = date("Y");
        $renjast = '		
        SELECT
        detdata2.kode2, 
        format(COALESCE(detdata2.totgiat,0),0,"id_ID") as totgiat,
        format(COALESCE((detdata2.totgiat/detdata1.totalnya)*100,0),2) as persen,
        detdata2.namakegiatan
        FROM
        (
        SELECT  data_renjas.kdgiat kode2, sum( data_renjas.jumlah) totgiat, master_kegiatans.nomenklatur_giat as namakegiatan
        FROM
         data_renjas 
        INNER JOIN master_kegiatans ON  data_renjas.kdgiat = master_kegiatans.kd_kegiatan and  data_renjas.thang ='.$dtYear.'
        GROUP BY 
        master_kegiatans.kd_kegiatan
        ) as detdata2
        INNER JOIN
        (
        SELECT data_renjas.kdgiat kode1, sum(data_renjas.jumlah) totalnya
        FROM
         data_renjas 
        where data_renjas.thang ='.$dtYear.'
        ) as detdata1
        ORDER BY detdata2.kode2
        ';
        $renjaData = DB::select(DB::raw($renjast));
        
        $breadcrumb = trans('cruds.dashboardvip.title_singular');
        return view('admin.dashboard.vip', compact('banpemyear', 'databanpem', 'pbData', 'prData',  'agent', 'breadcrumb', 'renjaData'));
    }

    /**
     * Show executive summary.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function executive()
    {
        $breadcrumb = trans('cruds.executive.title_singular');
        return view('admin.dashboard.executive', compact('breadcrumb'));
    }

    /**
     * Show pagu dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pagu(Request $request)
    {
        $dtYear1 = ($request->dtYear1 ?? '');
        $dtYear2 = ($request->dtYear2 ?? '');

        if ($dtYear1 == ''){
            $qryYear1 = '';
        } else {
            if ($dtYear1 == ''){
                $qryYear1 = ' = "' . $dtYear1 . '"';
            } else {
                $qryYear1 = ' between "' . $dtYear1 . '"';
            }
        }

        if ($dtYear2 == ''){
            $qryYear2 = '';
        } else {
            $qryYear2 = ' and "' . $dtYear2 . '"';   
        }

        //Log::info([$qryYear1, $qryYear2]);

        $breadcrumb = trans('cruds.pagu.title_singular');
        $years =  DataPagu::distinct()->orderBy('tahun', 'ASC')->get(['tahun']);

        $st = 'select 
        format(GROUP_CONCAT(dbdata.pagus),0, "id_ID") pagus , format(GROUP_CONCAT(dbdata.reals),0, "id_ID") reals, 
        Format(COALESCE(GROUP_CONCAT(dbdata.reals),0)/COALESCE(GROUP_CONCAT(dbdata.pagus),0) * 100, 2) as persen,
        format(GROUP_CONCAT(dbdata.KP_PAGU),0, "id_ID") KP_PAGU , format(GROUP_CONCAT(dbdata.KP_REAL),0, "id_ID") KP_REAL, 
        Format(COALESCE(GROUP_CONCAT(dbdata.KP_REAL),0)/COALESCE(GROUP_CONCAT(dbdata.pagus),0) * 100, 0) as persenkp,
        format(GROUP_CONCAT(dbdata.DK_PAGU),0, "id_ID") DK_PAGU , format(GROUP_CONCAT(dbdata.DK_REAL),0, "id_ID") DK_REAL, 
        Format(COALESCE(GROUP_CONCAT(dbdata.DK_REAL),0)/COALESCE(GROUP_CONCAT(dbdata.pagus),0) * 100, 0) as persendk,
        format(GROUP_CONCAT(dbdata.TP_PAGU),0, "id_ID") TP_PAGU , format(GROUP_CONCAT(dbdata.TP_REAL),0, "id_ID") TP_REAL ,
        Format(COALESCE(GROUP_CONCAT(dbdata.TP_REAL),0)/COALESCE(GROUP_CONCAT(dbdata.pagus),0) * 100, 0) as persentp
        
        FROM
        (
        select sum(data_pagus.amount) pagus, null reals , null as KP_PAGU, null as KP_REAL, null as DK_PAGU, null as DK_REAL, null as TP_PAGU, null as TP_REAL FROM
        data_pagus where data_pagus.tahun '.$qryYear1.$qryYear2.'
        union ALL
        select null pagus, sum(data_realisasis.amount) reals , null as KP_PAGU, null as KP_REAL, null as DK_PAGU, null as DK_REAL, null as TP_PAGU, null as TP_REAL  FROM
        data_realisasis where data_realisasis.tahun '.$qryYear1.$qryYear2.'
        union all
        select  null pagus, null reals , sum(data_pagus.amount) KP_PAGU, null as KP_REAL, null as DK_PAGU, null as DK_REAL, null as TP_PAGU, null as TP_REAL FROM
        data_pagus where data_pagus.tahun '.$qryYear1.$qryYear2.' and data_pagus.kewenangan = 1
        UNION ALL
        select  null pagus, null reals , null KP_PAGU,sum(data_realisasis.amount) KP_REAL, null as DK_PAGU, null as DK_REAL, null as TP_PAGU, null as TP_REAL FROM
        data_realisasis where data_realisasis.tahun '.$qryYear1.$qryYear2.' and data_realisasis.kewenangan = 1
        UNION ALL
        select  null pagus, null reals , null as KP_PAGU, null as KP_REAL, sum(data_pagus.amount) DK_PAGU, null as DK_REAL, null as TP_PAGU, null as TP_REAL FROM
        data_pagus where data_pagus.tahun '.$qryYear1.$qryYear2.' and data_pagus.kewenangan = 3
        UNION ALL
        select  null pagus, null reals , null KP_PAGU,null as KP_REAL, null as DK_PAGU, sum(data_realisasis.amount) DK_REAL, null as TP_PAGU, null as TP_REAL FROM
        data_realisasis where data_realisasis.tahun '.$qryYear1.$qryYear2.' and data_realisasis.kewenangan = 3
        UNION ALL
        select  null pagus, null reals , null as KP_PAGU, null as KP_REAL, null as DK_PAGU, null as DK_REAL, sum(data_pagus.amount) TP_PAGU, null as TP_REAL FROM
        data_pagus where data_pagus.tahun '.$qryYear1.$qryYear2.' and data_pagus.kewenangan = 4
        UNION ALL
        select  null pagus, null reals , null KP_PAGU,null as KP_REAL, null as DK_PAGU, null as DK_REAL, null as TP_PAGU, sum(data_realisasis.amount) TP_REAL FROM
        data_realisasis where data_realisasis.tahun '.$qryYear1.$qryYear2.' and data_realisasis.kewenangan = 4
        ) as dbdata';
        
        $prData = DB::select(DB::raw($st));
    
        $st2 = 'select
            detdata1.kode1, detdata1.deskripsi,
            format(COALESCE(detdata1.pagunya,0),0, "id_ID") as totpagu,
            format(COALESCE(detdata2.realisasinya,0),0, "id_ID") as totrealisasi,
            format(COALESCE((detdata2.realisasinya/detdata1.pagunya)*100,0),2) as persen
            
            FROM
            (
            SELECT RIGHT(data_pagus.program,2) kode1, sum(data_pagus.amount) pagunya, tbl_program.deskripsi as deskripsi
            FROM
            data_pagus 
            INNER JOIN tbl_program ON RIGHT(data_pagus.program,2) = tbl_program.kode and data_pagus.tahun '.$qryYear1.$qryYear2.'
            GROUP BY 
            tbl_program.kode
            ) as detdata1
            INNER JOIN
            (
            SELECT RIGHT(data_realisasis.program,2) kode2, sum(data_realisasis.amount) realisasinya
            FROM
            data_realisasis 
            INNER JOIN tbl_program ON RIGHT(data_realisasis.program,2) = tbl_program.kode and data_realisasis.tahun '.$qryYear1.$qryYear2.'
            GROUP BY 
            tbl_program.kode
            ) as detdata2
            ON detdata1.kode1 = detdata2.kode2 
            ORDER BY detdata1.kode1';
        $programData = DB::select(DB::raw($st2));
        
        if ($dtYear1 == '') { $dtYear1 = date("Y");}

        $st3 = 'select tw1.kode1, COALESCE(tw1.persen,0) as tw1, COALESCE(tw2.persen,0)	as tw2, COALESCE(tw3.persen,0) as tw3, COALESCE(tw4.persen,0) as tw4			
        FROM(				
                        SELECT
                        detdata1.kode1, 
                        format(COALESCE((detdata2.realisasinya/detdata1.pagunya)*100,0),2) as persen
                        FROM
                        (
                        SELECT data_pagus.kegiatan kode1, sum(data_pagus.amount) pagunya
                        FROM
                        data_pagus 
                        INNER JOIN master_kegiatans ON data_pagus.kegiatan = master_kegiatans.kd_kegiatan and data_pagus.tahun ="'.$dtYear1.'"
                        GROUP BY 
                        master_kegiatans.kd_kegiatan
                        ) as detdata1
                        INNER JOIN
                        (
                        SELECT data_realisasis.kegiatan kode2, sum(data_realisasis.amount) realisasinya
                        FROM
                        data_realisasis 
                        INNER JOIN master_kegiatans ON data_realisasis.kegiatan = master_kegiatans.kd_kegiatan and data_realisasis.tahun ="'.$dtYear1.'"
                        and  (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 4)
                        GROUP BY 
                        master_kegiatans.kd_kegiatan
                        ) as detdata2
                        ON detdata1.kode1 = detdata2.kode2 
        ) as tw1
        LEFT JOIN
        (				
                        SELECT
                        detdata1.kode1, 
                        format(COALESCE((detdata2.realisasinya/detdata1.pagunya)*100,0),2) as persen
                        FROM
                        (
                        SELECT data_pagus.kegiatan kode1, sum(data_pagus.amount) pagunya
                        FROM
                        data_pagus 
                        INNER JOIN master_kegiatans ON data_pagus.kegiatan = master_kegiatans.kd_kegiatan and data_pagus.tahun ="'.$dtYear1.'"
                        GROUP BY 
                        master_kegiatans.kd_kegiatan
                        ) as detdata1
                        INNER JOIN
                        (
                        SELECT data_realisasis.kegiatan kode2, sum(data_realisasis.amount) realisasinya
                        FROM
                        data_realisasis 
                        INNER JOIN master_kegiatans ON data_realisasis.kegiatan = master_kegiatans.kd_kegiatan and data_realisasis.tahun ="'.$dtYear1.'"
                        and  (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 7) and ((MONTH(NOW()) > 3 and YEAR(NOW()) = '.$dtYear1.') || YEAR(NOW()) > '.$dtYear1.')
                        GROUP BY 
                        master_kegiatans.kd_kegiatan
                        ) as detdata2
                        ON detdata1.kode1 = detdata2.kode2 
        ) as tw2
        ON tw1.kode1 = tw2.kode1
        LEFT JOIN
        (				
                        SELECT
                        detdata1.kode1, 
                        format(COALESCE((detdata2.realisasinya/detdata1.pagunya)*100,0),2) as persen
                        FROM
                        (
                        SELECT data_pagus.kegiatan kode1, sum(data_pagus.amount) pagunya
                        FROM
                        data_pagus 
                        INNER JOIN master_kegiatans ON data_pagus.kegiatan = master_kegiatans.kd_kegiatan and data_pagus.tahun ="'.$dtYear1.'"
                        GROUP BY 
                        master_kegiatans.kd_kegiatan
                        ) as detdata1
                        INNER JOIN
                        (
                        SELECT data_realisasis.kegiatan kode2, sum(data_realisasis.amount) realisasinya
                        FROM
                        data_realisasis 
                        INNER JOIN master_kegiatans ON data_realisasis.kegiatan = master_kegiatans.kd_kegiatan and data_realisasis.tahun ="'.$dtYear1.'"
                        and  (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) < 9) and ((MONTH(NOW()) > 6 and YEAR(NOW()) = '.$dtYear1.') || YEAR(NOW()) > '.$dtYear1.')
                        GROUP BY 
                        master_kegiatans.kd_kegiatan
                        ) as detdata2
                        ON detdata1.kode1 = detdata2.kode2 
        ) as tw3
        ON tw1.kode1 = tw3.kode1
        LEFT JOIN
        (				
                        SELECT
                        detdata1.kode1, 
                        format(COALESCE((detdata2.realisasinya/detdata1.pagunya)*100,0),2) as persen
                        FROM
                        (
                        SELECT data_pagus.kegiatan kode1, sum(data_pagus.amount) pagunya
                        FROM
                        data_pagus 
                        INNER JOIN master_kegiatans ON data_pagus.kegiatan = master_kegiatans.kd_kegiatan and data_pagus.tahun ="'.$dtYear1.'"
                        GROUP BY 
                        master_kegiatans.kd_kegiatan
                        ) as detdata1
                        INNER JOIN
                        (
                        SELECT data_realisasis.kegiatan kode2, sum(data_realisasis.amount) realisasinya
                        FROM
                        data_realisasis 
                        INNER JOIN master_kegiatans ON data_realisasis.kegiatan = master_kegiatans.kd_kegiatan and data_realisasis.tahun ="'.$dtYear1.'"
                        and  (MONTH(STR_TO_DATE(data_realisasis.tanggal, "%d/%m/%Y")) <= 12) and ((MONTH(NOW()) > 9 and YEAR(NOW()) = '.$dtYear1.') || YEAR(NOW()) > '.$dtYear1.')
                        GROUP BY 
                        master_kegiatans.kd_kegiatan
                        ) as detdata2
                        ON detdata1.kode1 = detdata2.kode2 
        ) as tw4
        ON tw1.kode1 = tw4.kode1
        ORDER BY tw1.kode1
        ';
        $twData = DB::select(DB::raw($st3));      

        //Log::info($twData);
        $st4 = 'select tw1.kode1, tw1.amount, COALESCE(tw1.persen,0) as tw1,	tw1.namakegiatan
        FROM(				
                        SELECT
                        detdata1.kode1, 
                        format(COALESCE(detdata2.realisasinya,0),0, "id_ID") as amount,
                        format(COALESCE((detdata2.realisasinya/detdata1.pagunya)*100,0),2) as persen,
                        detdata2.namakegiatan
                        FROM
                        (
                        SELECT data_pagus.kegiatan kode1, sum(data_pagus.amount) pagunya
                        FROM
                        data_pagus 
                        INNER JOIN master_kegiatans ON data_pagus.kegiatan = master_kegiatans.kd_kegiatan and data_pagus.tahun ="'.$dtYear1.'"
                        GROUP BY 
                        master_kegiatans.kd_kegiatan
                        ) as detdata1
                        INNER JOIN
                        (
                        SELECT data_realisasis.kegiatan kode2, sum(data_realisasis.amount) realisasinya, master_kegiatans.nomenklatur_giat as namakegiatan
                        FROM
                        data_realisasis 
                        INNER JOIN master_kegiatans ON data_realisasis.kegiatan = master_kegiatans.kd_kegiatan and data_realisasis.tahun ="'.$dtYear1.'"
                        GROUP BY 
                        master_kegiatans.kd_kegiatan
                        ) as detdata2
                        ON detdata1.kode1 = detdata2.kode2 
        ) as tw1
        ORDER BY tw1.kode1';
        $barData =  DB::select(DB::raw($st4)); 

        $topst = 'select satkerdata.kodesatker, satkerdata.namasatker, satkerdata.pagu, satkerdata.realisasi, format(satkerdata.persen,2) as persen
        FROM(				
                        SELECT
                        detdata1.kodesatker, 
                        format(COALESCE(detdata1.pagunya,0),0, "id_ID") as pagu,
                        format(COALESCE(detdata2.realisasinya,0),0, "id_ID") as realisasi,
                        COALESCE((detdata2.realisasinya/detdata1.pagunya)*100,0) as persen,
                        detdata2.namasatker
                        FROM
                        (
                        SELECT data_pagus.kdsatker kodesatker, sum(data_pagus.amount) pagunya
                        FROM
                        data_pagus 
                        INNER JOIN satkers ON satkers.kd_satker = data_pagus.kdsatker and data_pagus.tahun '.$qryYear1.$qryYear2.'
                        GROUP BY 
                        satkers.kd_satker
                        ) as detdata1
                        INNER JOIN
                        (
                        SELECT data_realisasis.kdsatker kode2, sum(data_realisasis.amount) realisasinya, satkers.nm_satker namasatker
                        FROM
                        data_realisasis 
                        INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker and data_realisasis.tahun '.$qryYear1.$qryYear2.'
                        GROUP BY 
                        satkers.kd_satker
                        ) as detdata2
                        ON detdata1.kodesatker = detdata2.kode2 
        ) as satkerdata
        ORDER BY satkerdata.persen desc LIMIT 10 ';
        $topData =  DB::select(DB::raw($topst)); 

        $lowst = 'select satkerdata.kodesatker, satkerdata.namasatker, satkerdata.pagu, satkerdata.realisasi, format(satkerdata.persen,2) as persen
        FROM(				
                        SELECT
                        detdata1.kodesatker, 
                        format(COALESCE(detdata1.pagunya,0),0, "id_ID") as pagu,
                        format(COALESCE(detdata2.realisasinya,0),0, "id_ID") as realisasi,
                        COALESCE((detdata2.realisasinya/detdata1.pagunya)*100,0) as persen,
                        detdata2.namasatker
                        FROM
                        (
                        SELECT data_pagus.kdsatker kodesatker, sum(data_pagus.amount) pagunya
                        FROM
                        data_pagus 
                        INNER JOIN satkers ON satkers.kd_satker = data_pagus.kdsatker and data_pagus.tahun '.$qryYear1.$qryYear2.'
                        GROUP BY 
                        satkers.kd_satker
                        ) as detdata1
                        INNER JOIN
                        (
                        SELECT data_realisasis.kdsatker kode2, sum(data_realisasis.amount) realisasinya, satkers.nm_satker namasatker
                        FROM
                        data_realisasis 
                        INNER JOIN satkers ON data_realisasis.kdsatker = satkers.kd_satker and data_realisasis.tahun '.$qryYear1.$qryYear2.'
                        GROUP BY 
                        satkers.kd_satker
                        ) as detdata2
                        ON detdata1.kodesatker = detdata2.kode2 
        ) as satkerdata
        ORDER BY satkerdata.persen LIMIT 10 ';
        $lowData =  DB::select(DB::raw($lowst)); 

        return view('admin.dashboard.pagu', compact('breadcrumb', 'years', 'dtYear1', 'dtYear2', 'prData','programData','twData','barData', 'topData', 'lowData'));
    }

    /**
     * Show banpem dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function banpem()
    {
        $breadcrumb = trans('cruds.banpem.title_singular');
        return view('admin.dashboard.banpem', compact('breadcrumb'));
    }
    
}

