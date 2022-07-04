<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataRenja;
use App\Models\Provinsi;
use App\Models\BackdateBanpem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB; 
use Yajra\DataTables\Facades\DataTables;

class DetailExecutiveController extends Controller
{
    public function index(Request $request)
    {  
        abort_if(Gate::denies('detail_renja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dtProp = '';
        if (!empty($request->dtProp))
        {
            $dtProp = $request->dtProp;
        } 

        $calcyears = DataRenja::distinct()->orderBy('thang', 'ASC')->offset(0)->limit(5)->get(['thang']);
        $sumyears = DataRenja::select(DB::raw('SUM(jumlah) as totaljum'))->groupBy('thang')->offset(0)->limit(5)->orderBy('thang','ASC')->get();
        $provinsi = Provinsi::distinct()->get(['kd_dt1', 'nm_prop']); 

        
        
            
            if ($dtProp == ''){
                $qryProp = '';
                $qryByProp = '';    
            } else {
                $qryProp = ' and prop.kd_dt1 = "' . $dtProp .'"';
                $qryByProp = ' and kab.kd_dt1 = "' . $dtProp .'"';
            }     
            $str = 'SELECT kd_kemenkeu as idk, nama_kab, FORMAT(sum(tot1),0) as tot1, FORMAT(sum(tot2),0) as tot2, FORMAT(sum(tot3),0) as tot3, FORMAT(sum(tot4),0) as tot4 from
            (
            select  prop.kd_kemenkeu, IF(prop.nm_prop = "", "-", prop.nm_prop )  as nama_kab,  sum(dr.jumlah) as tot1, NULL as tot2, NULL as tot3, NULL as tot4
            from data_renjas dr
            INNER JOIN provinsis prop ON prop.kd_dt1 = dr.kdlokasi  and dr.kdkabkota="00" and dr.thang = 2019 '. $qryProp .'
            GROUP BY prop.nm_prop
            
            UNION ALL
						
            select  prop.kd_kemenkeu, IF(prop.nm_prop = "", "-", prop.nm_prop ) as nama_kab,  NULL as tot1, sum(dr.jumlah) as tot2,  NULL as tot3, NULL as tot4
            from data_renjas dr
            INNER JOIN provinsis prop ON prop.kd_dt1 = dr.kdlokasi  and dr.kdkabkota="00" and dr.thang = 2020 '. $qryProp .'
            GROUP BY prop.nm_prop
            
            UNION ALL
						
            select  prop.kd_kemenkeu, IF(prop.nm_prop = "", "-", prop.nm_prop ) as nama_kab,  NULL as tot1,   NULL as tot2, sum(dr.jumlah) as tot3, NULL as tot4
            from data_renjas dr
            INNER JOIN provinsis prop ON prop.kd_dt1 = dr.kdlokasi  and dr.kdkabkota="00" and dr.thang = 2021 '. $qryProp .'
            GROUP BY prop.nm_prop
            
            UNION ALL
						
            select  prop.kd_kemenkeu, IF(prop.nm_prop = "", "-", prop.nm_prop ) as nama_kab,  NULL as tot1,   NULL as tot2,  NULL as tot3, sum(dr.jumlah) as tot4
            from data_renjas dr
            INNER JOIN provinsis prop ON prop.kd_dt1 = dr.kdlokasi  and dr.kdkabkota="00" and dr.thang = 2022 '. $qryProp .'
            GROUP BY prop.nm_prop
            
            UNION ALL
						
						
            select  kab.kd_kemenkeu, IF(kab.nama_kab = "", "-", kab.nama_kab)  as nama_kab, sum(dr.jumlah) as tot1, NULL as tot2, NULL as tot3, NULL as tot4
            from data_renjas dr
            INNER JOIN kabupatens kab ON kab.kd_dt2 = dr.kdkabkota and kab.kd_dt1 = dr.kdlokasi and dr.thang = 2019 '. $qryByProp .'
            GROUP BY kab.nama_kab
            
            UNION ALL
            
            select  kab.kd_kemenkeu, IF(kab.nama_kab = "", "-", kab.nama_kab) as nama_kab, null as tot1, sum(dr.jumlah) as tot2, NULL as tot3, NULL as tot4
            from data_renjas dr
            INNER JOIN kabupatens kab ON kab.kd_dt2 = dr.kdkabkota and kab.kd_dt1 = dr.kdlokasi and dr.thang = 2020 '. $qryByProp .'
            GROUP BY kab.nama_kab
						
            
            UNION ALL
            
            select kab.kd_kemenkeu, IF(kab.nama_kab = "", "-", kab.nama_kab) as nama_kab, null as tot1, null as tot2, sum(dr.jumlah) as tot3, NULL as tot4
            from data_renjas dr
            INNER JOIN kabupatens kab ON kab.kd_dt2 = dr.kdkabkota and kab.kd_dt1 = dr.kdlokasi and dr.thang = 2021 '. $qryByProp .'
            GROUP BY kab.nama_kab
            
            UNION ALL
            
            select  kab.kd_kemenkeu, IF(kab.nama_kab = "", "-", kab.nama_kab) as nama_kab, null as tot1, null as tot2, null as tot3, sum(dr.jumlah) as tot4
            from data_renjas dr
            INNER JOIN kabupatens kab ON kab.kd_dt2 = dr.kdkabkota and kab.kd_dt1 = dr.kdlokasi and dr.thang = 2022 '. $qryByProp .'
            GROUP BY kab.nama_kab
            order BY  nama_kab
            ) as tabdata 
            GROUP BY tabdata.nama_kab ORDER BY tabdata.nama_kab';
            
               

            $query = DB::select(DB::raw($str));
            $dettable = Datatables::of($query);
            
            $dettable->addColumn('actions', '&nbsp;');

            $dettable->editColumn('actions', function ($row) {
                $viewGate = 'detail_renja_show';
                $crudRoutePart = 'detailrenja';
                return view('partials.detailTblAction', compact(
                'viewGate',
                'crudRoutePart',
                'row'
                
            ));
            });
            
            $dettable->editColumn('idk', function ($row) {
                return $row->idk ? $row->idk : '';
            });
            $dettable->editColumn('nama_kab', function ($row) {
                return $row->nama_kab ? $row->nama_kab : '';
            });
            $dettable->editColumn('tot1', function ($row) {
                return $row->tot1 ? $row->tot1 : 0;
            });
            $dettable->editColumn('tot2', function ($row) {
                return $row->tot2 ? $row->tot2 : 0;
            });
            $dettable->editColumn('tot3', function ($row) {
                return $row->tot3 ? $row->tot3 : 0;
            });
            $dettable->editColumn('tot4', function ($row) {
                return $row->tot4 ? $row->tot4 : 0;
            });
            

            $dettable->rawColumns(['actions']);
            $stable = $dettable->make(true);
            //dd($stable);
        $breadcrumb = trans('cruds.detailrenja.title_singular') ;
        return view('admin.detailrenja.index', compact('breadcrumb', 'calcyears', 'provinsi', 'dtProp', 'stable'));

    }

   

    public function show(Request $request)
    {
        abort_if(Gate::denies('detail_renja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //dd($request->route('idk'));

        $idk = ($request->route('idk')??'');
        $nmkab = ($request->route('nmkab')??'');
        if ($idk == ''){
            $qryByProp = '';    
        } else {
            $dt1 = substr($idk, 0, 2);
            $dt2 = substr($idk, 2, 2);
            $qryByProp = ' and kab.kd_dt1 = "' . $idk .'"';
        }     
            $str = 'select null as id, tabdata.nmoutput, GROUP_CONCAT(tabdata.vol1) vol1, GROUP_CONCAT(tabdata.sat1) sat1,  FORMAT(sum(tabdata.jumlah1),0) as jumlah1,  GROUP_CONCAT(tabdata.vol2) vol2, GROUP_CONCAT(tabdata.sat2) sat2,  FORMAT(sum(tabdata.jumlah2),0) as jumlah2, GROUP_CONCAT(tabdata.vol3) vol3, GROUP_CONCAT(tabdata.sat3) sat3,  FORMAT(sum(tabdata.jumlah3),0) as jumlah3, GROUP_CONCAT(tabdata.vol4) vol4, GROUP_CONCAT(tabdata.sat4) sat4,  FORMAT(sum(tabdata.jumlah4),0) as jumlah4 
            from(
            select ro.nmoutput,  dr.volkeg as vol1, ro.sat as sat1,  sum(dr.jumlah) as jumlah1, null as vol2 , null as sat2, null as jumlah2, null as vol3 , null as sat3, null as jumlah3, null as vol4 , null as sat4, null as jumlah4
            from rincian_outputs ro
            INNER JOIN data_renjas dr on dr.thang = ro.thang and dr.kdgiat = ro.kdgiat and dr.kdoutput = ro.kdoutput 
            and dr.kdlokasi = "'.$dt1.'" and dr.kdkabkota = "'.$dt2.'"  and dr.thang = "2019"
            GROUP BY ro.kdgiat, ro.kdoutput
            
            UNION ALL
            
            select ro.nmoutput,  null as vol1 , null as sat1, null as jumlah1, dr.volkeg as vol2, ro.sat as sat2,  sum(dr.jumlah) as jumlah2, null as vol3 , null as sat3, null as jumlah3, null as vol4 , null as sat4, null as jumlah4
            from rincian_outputs ro
            INNER JOIN data_renjas dr on dr.thang = ro.thang and dr.kdgiat = ro.kdgiat and dr.kdoutput = ro.kdoutput 
            and dr.kdlokasi = "'.$dt1.'"  and dr.kdkabkota = "'.$dt2.'"  and dr.thang = "2020"
            GROUP BY ro.kdgiat, ro.kdoutput
            
            UNION ALL
            
            select ro.nmoutput,   null as vol1 , null as sat1, null as jumlah1, null as vol2 , null as sat2, null as jumlah2, dr.volkeg as vol3, ro.sat as sat3, sum(dr.jumlah) as jumlah3, null as vol4 , null as sat4, null as jumlah4
            from rincian_outputs ro
            INNER JOIN data_renjas dr on dr.thang = ro.thang and dr.kdgiat = ro.kdgiat and dr.kdoutput = ro.kdoutput 
            and dr.kdlokasi = "'.$dt1.'"  and dr.kdkabkota = "'.$dt2.'"  and dr.thang = "2021"
            GROUP BY ro.kdgiat, ro.kdoutput
            
            UNION ALL
            
            select ro.nmoutput,  null as vol1 , null as sat1,  null as jumlah1, null as vol2 , null as sat2,  null as jumlah2 , null as vol3 , null as sat3,  null as jumlah3, dr.volkeg as vol4, ro.sat as sat4,  sum(dr.jumlah) as jumlah4
            from rincian_outputs ro
            INNER JOIN data_renjas dr on dr.thang = ro.thang and dr.kdgiat = ro.kdgiat and dr.kdoutput = ro.kdoutput 
            and dr.kdlokasi = "'.$dt1.'"  and dr.kdkabkota = "'.$dt2.'"  and dr.thang = "2022"
            GROUP BY ro.kdgiat, ro.kdoutput
            ) as tabdata 
            GROUP BY tabdata.nmoutput ORDER BY tabdata.nmoutput';
            
            $query = DB::select(DB::raw($str));
            $table = Datatables::of($query);
            
            $table->addColumn('actions', '&nbsp;');
            /*
            $table->editColumn('actions', function ($row) {
                $viewGate2 = 'detail_renja_show';
                $crudRoutePart = 'detailrenja';
                return view('partials.detailTblAction', compact(
                'viewGate2',
                'crudRoutePart',
                'row'
                
            ));
            });  */ 

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('nmoutput', function ($row) {
                return $row->nmoutput ? $row->nmoutput : '';
            });
            $table->editColumn('vol1', function ($row) {
                return $row->sat1 ? $row->vol1 : '';
            });
            $table->editColumn('sat1', function ($row) {
                return $row->sat1 ? $row->sat1 : '';
            });
            $table->editColumn('jumlah1', function ($row) {
                return $row->jumlah1 ? $row->jumlah1 : '';
            });
            $table->editColumn('vol2', function ($row) {
                return $row->sat2 ? $row->vol2 : '';
            });
            $table->editColumn('sat2', function ($row) {
                return $row->sat2 ? $row->sat2 : '';
            });
            $table->editColumn('jumlah2', function ($row) {
                return $row->jumlah2 ? $row->jumlah2 : '';
            });
            $table->editColumn('vol3', function ($row) {
                return $row->sat3 ? $row->vol3 : '';
            });
            $table->editColumn('sat3', function ($row) {
                return $row->sat3 ? $row->sat3 : '';
            });
            $table->editColumn('jumlah3', function ($row) {
                return $row->jumlah3 ? $row->jumlah3 : '';
            });
            $table->editColumn('vol4', function ($row) {
                return $row->sat4 ? $row->vol4 : '';
            });
            $table->editColumn('sat4', function ($row) {
                return $row->sat4 ? $row->sat4 : '';
            });
            $table->editColumn('jumlah4', function ($row) {
                return $row->jumlah4 ? $row->jumlah4 : '';
            });

            $table->rawColumns([]);
            $stable = $table->make(true);
        $breadcrumb = 'Alokasi Rincian Output Ditjen Hortikultura Untuk : '. $nmkab ;
        return view('admin.detailrenja.show', compact('breadcrumb', 'stable'));

        
    }

    public function banpem(Request $request)
    {  
        abort_if(Gate::denies('detail_banpem_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dtProp = '';
        $dtYear = '';
        if (!empty($request->dtProp))
        {
            $dtProp = $request->dtProp;
        }
        if (!empty($request->dtYear))
        {
            $dtYear = $request->dtYear;
        } 

    
            
        if ($dtProp == ''){
            $qryProp = '';
        } else {
            $qryProp = ' WHERE tabdata.provinsi = "' . $dtProp .'"';
        }     
        if ($dtYear == ''){
            $dtYear = '0';
            $qryYear = '';
        } else {
            $qryYear = ' and backdate_banpems.`year` = "' . $dtYear .'"';
        }  

            $str = '
            SELECT '.$dtYear.' as year, tabdata.provinsi, format(sum(tabdata.tot1),0) as tot1, GROUP_CONCAT(tabdata.kwn1) as kwn1, format(sum(tabdata.tot2),0) as tot2, GROUP_CONCAT(tabdata.kwn2) as kwn2, format(sum(tabdata.tot3),0) as tot3, GROUP_CONCAT(tabdata.kwn3) as kwn3, format(sum(tabdata.tot4),0) as tot4, GROUP_CONCAT(tabdata.kwn4) as kwn4
            from
            (SELECT
                IF(backdate_banpems.provinsi = "", "-", backdate_banpems.provinsi ) provinsi, sum(backdate_banpems.nominal) as tot1, backdate_banpems.kwn as kwn1,
                null as tot2,null as kwn2,null as tot3,null as kwn3,null as tot4,null as kwn4
            FROM
                backdate_banpems where backdate_banpems.kwn is null '. $qryYear . '
            GROUP BY
                backdate_banpems.provinsi
                
            UNION ALL

            SELECT
                IF(backdate_banpems.provinsi = "", "-", backdate_banpems.provinsi ) provinsi,sum(backdate_banpems.nominal) as tot1, backdate_banpems.kwn as kwn1,
                null as tot2,null as kwn2,null as tot3,null as kwn3,null as tot4,null as kwn4
            FROM
                backdate_banpems where backdate_banpems.kwn = "KP" '. $qryYear . '
            GROUP BY
                backdate_banpems.provinsi

            UNION ALL

            SELECT
                IF(backdate_banpems.provinsi = "", "-", backdate_banpems.provinsi ) provinsi, 
                null as tot1,null as kwn1,
                sum(backdate_banpems.nominal) as tot2, backdate_banpems.kwn as kwn2,null as tot3,null as kwn3,null as tot4,null as kwn4
            FROM
                backdate_banpems where backdate_banpems.kwn = "DK" '. $qryYear . '
            GROUP BY
                backdate_banpems.provinsi
                
            UNION ALL

            SELECT
                IF(backdate_banpems.provinsi = "", "-", backdate_banpems.provinsi ) provinsi, 
                null as tot1,null as kwn1,null as tot2,null as kwn2,
                sum(backdate_banpems.nominal) as tot3, backdate_banpems.kwn as kwn3,null as tot4,null as kwn4
            FROM
                backdate_banpems where backdate_banpems.kwn = "TP (PROV)" '. $qryYear . '
            GROUP BY
                backdate_banpems.provinsi
                
            UNION ALL

            SELECT
                IF(backdate_banpems.provinsi = "", "-", backdate_banpems.provinsi ) provinsi, 
                null as tot1,null as kwn1,null as tot2,null as kwn2,
                null as tot3,null as kwn3,
                sum(backdate_banpems.nominal) as tot4, backdate_banpems.kwn as kwn4
            FROM
                backdate_banpems where backdate_banpems.kwn = "TP (KAB/KOTA)" '. $qryYear . '
            GROUP BY
                backdate_banpems.provinsi
                ) as tabdata 
            '. $qryProp . '
            GROUP BY tabdata.provinsi
            ORDER BY tabdata.provinsi
            ';
            
            $query = DB::select(DB::raw($str));
            $dettable = Datatables::of($query);
            
            $dettable->addColumn('actions', '&nbsp;');

            $dettable->editColumn('actions', function ($row) {
                $viewGate = 'detail_banpem_show';
                $crudRoutePart = 'detailbanpem';
                return view('partials.detailBanpemAction', compact('viewGate','crudRoutePart','row'));
            });
            
            $dettable->editColumn('year', function ($row) {
                return $row->year ? $row->year : '';
            });
            $dettable->editColumn('provinsi', function ($row) {
                return $row->provinsi ? $row->provinsi : '';
            });
            $dettable->editColumn('tot1', function ($row) {
                return $row->tot1 ? $row->tot1 : '';
            });
            $dettable->editColumn('kwn1', function ($row) {
                return $row->kwn1 ? $row->kwn1 : '';
            });
            $dettable->editColumn('tot2', function ($row) {
                return $row->tot2 ? $row->tot2 : '';
            });
            $dettable->editColumn('kwn2', function ($row) {
                return $row->kwn2 ? $row->kwn2 : '';
            });
            $dettable->editColumn('tot3', function ($row) {
                return $row->tot3 ? $row->tot3 : '';
            });
            $dettable->editColumn('kwn3', function ($row) {
                return $row->kwn3 ? $row->kwn3 : '';
            });
            $dettable->editColumn('tot4', function ($row) {
                return $row->tot4 ? $row->tot4 : '';
            });
            $dettable->editColumn('kwn4', function ($row) {
                return $row->kwn4 ? $row->kwn4 : '';
            });
            

            $dettable->rawColumns(['actions']);
            $stable = $dettable->make(true);
            //dd($stable);
        $breadcrumb = trans('cruds.detailbanpem.title_singular') ;
        $provinsi = BackdateBanpem::where('provinsi', '!=', '')->distinct()->orderBy('provinsi', 'ASC')->get(['provinsi']); 
        $years =  BackdateBanpem::distinct()->orderBy('year', 'ASC')->get(['year']);
        return view('admin.detailbanpem.index', compact('breadcrumb', 'provinsi', 'years', 'dtYear', 'dtProp', 'stable'));

    }

    public function banpemshow(Request $request)
    {
        abort_if(Gate::denies('detail_banpem_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $year = ($request->route('year') ?? '');
        $nmprop = ($request->route('provinsi') ?? '');
        if (($year == '')||($year == '0')){
            $qryByYear = '';    
        } else {
            $qryByYear = ' and `year` = '. $year;
        } 
        if (($nmprop == '')||($nmprop == '-')){
            $qryByProp = ' where provinsi = " "';    
        } else {
            $qryByProp = ' where provinsi = "' . $nmprop . '"';
        }  

            $str = 'select year as id, kab_kota, nm_gapoktan, nm_barang, format(total,0) total, format(nominal,0) nominal, kwn, kd_giat, kd_akun
            from backdate_banpems
            '.$qryByProp. $qryByYear;
            
            $query = DB::select(DB::raw($str));
            $table = Datatables::of($query);
            
            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('kab_kota', function ($row) {
                return $row->kab_kota ? $row->kab_kota : '';
            });
            $table->editColumn('nm_gapoktan', function ($row) {
                return $row->nm_gapoktan ? $row->nm_gapoktan : '';
            });
            $table->editColumn('nm_barang', function ($row) {
                return $row->nm_barang ? $row->nm_barang : '';
            });
            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : '';
            });
            $table->editColumn('nominal', function ($row) {
                return $row->nominal ? $row->nominal : '';
            });
            $table->editColumn('kwn', function ($row) {
                return $row->kwn ? $row->kwn : '';
            });
            $table->editColumn('kd_giat', function ($row) {
                return $row->kd_giat ? $row->kd_giat : '';
            });
            $table->editColumn('kd_akun', function ($row) {
                return $row->kd_akun ? $row->kd_akun : '';
            });
            

            $table->rawColumns([]);
            $stable = $table->make(true);
            
        $breadcrumb = 'Rincian Alokasi Bantuan Untuk : '. $nmprop;
        if (($year != '')&&($year != '0')){
            $breadcrumb = $breadcrumb . ' tahun ' . $year;    
        }
        return view('admin.detailbanpem.show', compact('breadcrumb', 'stable'));

    }
}
