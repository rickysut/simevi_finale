<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProvinsiRequest;
use App\Http\Requests\StoreProvinsiRequest;
use App\Http\Requests\UpdateProvinsiRequest;
use App\Models\Provinsi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
//use App\Models\Satker;

class ProvinsiController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('provinsi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Provinsi::with(['kd_satker'])->select(sprintf('%s.*', (new Provinsi())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'provinsi_show';
                $editGate = 'provinsi_edit';
                $deleteGate = 'provinsi_delete';
                $crudRoutePart = 'provinsis';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('kd_prop', function ($row) {
                return $row->kd_prop ? $row->kd_prop : '';
            });
            $table->editColumn('kd_dt1', function ($row) {
                return $row->kd_dt1 ? $row->kd_dt1 : '';
            });
            $table->editColumn('nm_prop', function ($row) {
                return $row->nm_prop ? $row->nm_prop : '';
            });
            $table->editColumn('kd_bast', function ($row) {
                return $row->kd_bast ? $row->kd_bast : '';
            });
            $table->editColumn('lat', function ($row) {
                return $row->lat ? $row->lat : 0;
            });
            $table->editColumn('lng', function ($row) {
                return $row->lng ? $row->lng : 0;
            });
            /*$table->addColumn('kd_satker_kd_satker', function ($row) {
                return $row->kd_satker ? $row->kd_satker->kd_satker : '';
            });
            $table->addColumn('kd_satker_id', function ($row) {
                return $row->kd_satker ? $row->kd_satker->id : '';
            });*/
            $table->editColumn('kd_kemenkeu', function ($row) {
                return $row->kd_kemenkeu ? $row->kd_kemenkeu : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'kd_satker']);
            
            return $table->make(true);
        }
        $breadcrumb = trans('cruds.provinsi.title_singular') ." ". trans('global.list');
        return view('admin.provinsis.index', compact('breadcrumb'));
    }

    public function create()
    {
        abort_if(Gate::denies('provinsi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$kd_satkers = Satker::where('status', 1)->pluck('nm_satker', 'kd_satker')->prepend(trans('global.pleaseSelect'), '');
        $breadcrumb = trans('global.create') ." ". trans('cruds.provinsi.title_singular');
        return view('admin.provinsis.create', compact('breadcrumb'));
    }

    public function store(StoreProvinsiRequest $request)
    {
        $provinsi = Provinsi::create($request->all());

        return redirect()->route('admin.provinsis.index');
    }

    public function edit(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$kd_satkers = Satker::pluck('nm_satker', 'kd_satker')->prepend(trans('global.pleaseSelect'), '');

        $provinsi->load('kd_satker');
        $breadcrumb = trans('global.edit') ." ". trans('cruds.provinsi.title_singular');
        return view('admin.provinsis.edit', compact( 'provinsi', 'breadcrumb'));
    }

    public function update(UpdateProvinsiRequest $request, Provinsi $provinsi)
    {
        $provinsi->update($request->all());

        return redirect()->route('admin.provinsis.index');
    }

    public function show(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinsi->load('kd_satker');
        $breadcrumb = trans('global.show') ." ". trans('cruds.provinsi.title_singular');
        return view('admin.provinsis.show', compact('provinsi', 'breadcrumb'));
    }

    public function destroy(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinsi->delete();

        return back();
    }

    public function massDestroy(MassDestroyProvinsiRequest $request)
    {
        Provinsi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
