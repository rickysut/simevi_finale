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
        
        $breadcrumb = trans('cruds.dashboardvip.title_singular');
        return view('admin.dashboard.vip', compact('banpemyear', 'databanpem', 'pbData', 'prData',  'agent', 'breadcrumb'));
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
        $dtProp = '';
        $dtYear1 = '';
        $dtYear2 = '';
        if (!empty($request->dtProp))
        {
            $dtProp = $request->dtProp;
        }
        if (!empty($request->dtYear1))
        {
            $dtYear1 = $request->dtYear1;
        } 
        if (!empty($request->dtYear2))
        {
            $dtYear2 = $request->dtYear2;
        } 
        $breadcrumb = trans('cruds.pagu.title_singular');
        $years =  DataPagu::distinct()->orderBy('tahun', 'ASC')->get(['tahun']);
        return view('admin.dashboard.pagu', compact('breadcrumb', 'years', 'dtYear1', 'dtYear2'));
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

