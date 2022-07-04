<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDataRenjaRequest;
use App\Http\Requests\StoreDataRenjaRequest;
use App\Http\Requests\UpdateDataRenjaRequest;
use App\Models\DataRenja;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DataRenjaController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('data_renja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DataRenja::query()->select(sprintf('%s.*', (new DataRenja())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'data_renja_show';
                $editGate = 'data_renja_edit';
                $deleteGate = 'data_renja_delete';
                $crudRoutePart = 'data-renjas';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('thang', function ($row) {
                return $row->thang ? $row->thang : '';
            });
            $table->editColumn('kdjendok', function ($row) {
                return $row->kdjendok ? $row->kdjendok : '';
            });
            $table->editColumn('kdsatker', function ($row) {
                return $row->kdsatker ? $row->kdsatker : '';
            });
            $table->editColumn('kddept', function ($row) {
                return $row->kddept ? $row->kddept : '';
            });
            $table->editColumn('kdunit', function ($row) {
                return $row->kdunit ? $row->kdunit : '';
            });
            $table->editColumn('kdprogram', function ($row) {
                return $row->kdprogram ? $row->kdprogram : '';
            });
            $table->editColumn('kdgiat', function ($row) {
                return $row->kdgiat ? $row->kdgiat : '';
            });
            $table->editColumn('kdoutput', function ($row) {
                return $row->kdoutput ? $row->kdoutput : '';
            });
            $table->editColumn('kdlokasi', function ($row) {
                return $row->kdlokasi ? $row->kdlokasi : '';
            });
            $table->editColumn('kdkabkota', function ($row) {
                return $row->kdkabkota ? $row->kdkabkota : '';
            });
            $table->editColumn('kddekon', function ($row) {
                return $row->kddekon ? $row->kddekon : '';
            });
            $table->editColumn('kdsoutput', function ($row) {
                return $row->kdsoutput ? $row->kdsoutput : '';
            });
            $table->editColumn('kdkmpnen', function ($row) {
                return $row->kdkmpnen ? $row->kdkmpnen : '';
            });
            $table->editColumn('kdskmpnen', function ($row) {
                return $row->kdskmpnen ? $row->kdskmpnen : '';
            });
            $table->editColumn('kdakun', function ($row) {
                return $row->kdakun ? $row->kdakun : '';
            });
            $table->editColumn('kdkppn', function ($row) {
                return $row->kdkppn ? $row->kdkppn : '';
            });
            $table->editColumn('kdbeban', function ($row) {
                return $row->kdbeban ? $row->kdbeban : '';
            });
            $table->editColumn('kdjnsban', function ($row) {
                return $row->kdjnsban ? $row->kdjnsban : '';
            });
            $table->editColumn('kdctarik', function ($row) {
                return $row->kdctarik ? $row->kdctarik : '';
            });
            $table->editColumn('register', function ($row) {
                return $row->register ? $row->register : '';
            });
            $table->editColumn('carahitung', function ($row) {
                return $row->carahitung ? $row->carahitung : '';
            });
            $table->editColumn('header1', function ($row) {
                return $row->header1 ? $row->header1 : '';
            });
            $table->editColumn('header2', function ($row) {
                return $row->header2 ? $row->header2 : '';
            });
            $table->editColumn('kdheader', function ($row) {
                return $row->kdheader ? $row->kdheader : '';
            });
            $table->editColumn('noitem', function ($row) {
                return $row->noitem ? $row->noitem : '';
            });
            $table->editColumn('nmitem', function ($row) {
                return $row->nmitem ? $row->nmitem : '';
            });
            $table->editColumn('vol1', function ($row) {
                return $row->vol1 ? $row->vol1 : '';
            });
            $table->editColumn('sat1', function ($row) {
                return $row->sat1 ? $row->sat1 : '';
            });
            $table->editColumn('vol2', function ($row) {
                return $row->vol2 ? $row->vol2 : '';
            });
            $table->editColumn('sat2', function ($row) {
                return $row->sat2 ? $row->sat2 : '';
            });
            $table->editColumn('vol3', function ($row) {
                return $row->vol3 ? $row->vol3 : '';
            });
            $table->editColumn('sat3', function ($row) {
                return $row->sat3 ? $row->sat3 : '';
            });
            $table->editColumn('vol4', function ($row) {
                return $row->vol4 ? $row->vol4 : '';
            });
            $table->editColumn('sat4', function ($row) {
                return $row->sat4 ? $row->sat4 : '';
            });
            $table->editColumn('volkeg', function ($row) {
                return $row->volkeg ? $row->volkeg : '';
            });
            $table->editColumn('satkeg', function ($row) {
                return $row->satkeg ? $row->satkeg : '';
            });
            $table->editColumn('hargasat', function ($row) {
                return $row->hargasat ? $row->hargasat : '';
            });
            $table->editColumn('jumlah', function ($row) {
                return $row->jumlah ? $row->jumlah : '';
            });
            $table->editColumn('jumlah2', function ($row) {
                return $row->jumlah2 ? $row->jumlah2 : '';
            });
            $table->editColumn('paguphln', function ($row) {
                return $row->paguphln ? $row->paguphln : '';
            });
            $table->editColumn('pagurmp', function ($row) {
                return $row->pagurmp ? $row->pagurmp : '';
            });
            $table->editColumn('pagurkp', function ($row) {
                return $row->pagurkp ? $row->pagurkp : '';
            });
            $table->editColumn('kdblokir', function ($row) {
                return $row->kdblokir ? $row->kdblokir : '';
            });
            $table->editColumn('blokirphln', function ($row) {
                return $row->blokirphln ? $row->blokirphln : '';
            });
            $table->editColumn('blokirrmp', function ($row) {
                return $row->blokirrmp ? $row->blokirrmp : '';
            });
            $table->editColumn('blokirrkp', function ($row) {
                return $row->blokirrkp ? $row->blokirrkp : '';
            });
            $table->editColumn('rphblokir', function ($row) {
                return $row->rphblokir ? $row->rphblokir : '';
            });
            $table->editColumn('kdcopy', function ($row) {
                return $row->kdcopy ? $row->kdcopy : '';
            });
            $table->editColumn('kdabt', function ($row) {
                return $row->kdabt ? $row->kdabt : '';
            });
            $table->editColumn('kdsbu', function ($row) {
                return $row->kdsbu ? $row->kdsbu : '';
            });
            $table->editColumn('volsbk', function ($row) {
                return $row->volsbk ? $row->volsbk : '';
            });
            $table->editColumn('volrkakl', function ($row) {
                return $row->volrkakl ? $row->volrkakl : '';
            });
            $table->editColumn('blnkontrak', function ($row) {
                return $row->blnkontrak ? $row->blnkontrak : '';
            });
            $table->editColumn('nokontrak', function ($row) {
                return $row->nokontrak ? $row->nokontrak : '';
            });
            $table->editColumn('tgkontrak', function ($row) {
                return $row->tgkontrak ? $row->tgkontrak : '';
            });
            $table->editColumn('nilkontrak', function ($row) {
                return $row->nilkontrak ? $row->nilkontrak : '';
            });
            $table->editColumn('januari', function ($row) {
                return $row->januari ? $row->januari : '';
            });
            $table->editColumn('pebruari', function ($row) {
                return $row->pebruari ? $row->pebruari : '';
            });
            $table->editColumn('maret', function ($row) {
                return $row->maret ? $row->maret : '';
            });
            $table->editColumn('april', function ($row) {
                return $row->april ? $row->april : '';
            });
            $table->editColumn('mei', function ($row) {
                return $row->mei ? $row->mei : '';
            });
            $table->editColumn('juni', function ($row) {
                return $row->juni ? $row->juni : '';
            });
            $table->editColumn('juli', function ($row) {
                return $row->juli ? $row->juli : '';
            });
            $table->editColumn('agustus', function ($row) {
                return $row->agustus ? $row->agustus : '';
            });
            $table->editColumn('september', function ($row) {
                return $row->september ? $row->september : '';
            });
            $table->editColumn('oktober', function ($row) {
                return $row->oktober ? $row->oktober : '';
            });
            $table->editColumn('nopember', function ($row) {
                return $row->nopember ? $row->nopember : '';
            });
            $table->editColumn('desember', function ($row) {
                return $row->desember ? $row->desember : '';
            });
            $table->editColumn('jmltunda', function ($row) {
                return $row->jmltunda ? $row->jmltunda : '';
            });
            $table->editColumn('kdluncuran', function ($row) {
                return $row->kdluncuran ? $row->kdluncuran : '';
            });
            $table->editColumn('jmlabt', function ($row) {
                return $row->jmlabt ? $row->jmlabt : '';
            });
            $table->editColumn('norev', function ($row) {
                return $row->norev ? $row->norev : '';
            });
            $table->editColumn('kdubah', function ($row) {
                return $row->kdubah ? $row->kdubah : '';
            });
            $table->editColumn('kurs', function ($row) {
                return $row->kurs ? $row->kurs : '';
            });
            $table->editColumn('indexkpjm', function ($row) {
                return $row->indexkpjm ? $row->indexkpjm : '';
            });
            $table->editColumn('kdib', function ($row) {
                return $row->kdib ? $row->kdib : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        $breadcrumb = trans('cruds.dataRenja.title_singular') ." ". trans('global.list');
        return view('admin.dataRenjas.index', compact('breadcrumb'));
    }

    public function create()
    {
        abort_if(Gate::denies('data_renja_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.create') ." ". trans('cruds.dataRenja.title_singular');
        return view('admin.dataRenjas.create', compact('breadcrumb'));
    }

    public function store(StoreDataRenjaRequest $request)
    {
        $dataRenja = DataRenja::create($request->all());
        $breadcrumb = trans('global.create') ." ". trans('cruds.dataRenja.title_singular');
        
        return redirect()->route('admin.data-renjas.index');
    }

    public function edit(DataRenja $dataRenja)
    {
        abort_if(Gate::denies('data_renja_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.edit') ." ". trans('cruds.dataRenja.title_singular');
        return view('admin.dataRenjas.edit', compact('breadcrumb','dataRenja'));
    }

    public function update(UpdateDataRenjaRequest $request, DataRenja $dataRenja)
    {
        $dataRenja->update($request->all());

        return redirect()->route('admin.data-renjas.index');
    }

    public function show(DataRenja $dataRenja)
    {
        abort_if(Gate::denies('data_renja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.show') ." ". trans('cruds.dataRenja.title_singular');
        
        return view('admin.dataRenjas.show', compact('breadcrumb','dataRenja'));
    }

    public function destroy(DataRenja $dataRenja)
    {
        abort_if(Gate::denies('data_renja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataRenja->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataRenjaRequest $request)
    {
        DataRenja::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
