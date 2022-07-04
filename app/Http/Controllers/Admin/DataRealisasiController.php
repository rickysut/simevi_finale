<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDataRealisasiRequest;
use App\Http\Requests\StoreDataRealisasiRequest;
use App\Http\Requests\UpdateDataRealisasiRequest;
use App\Models\DataRealisasi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DataRealisasiController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('data_realisasi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DataRealisasi::query()->select(sprintf('%s.*', (new DataRealisasi())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'data_realisasi_show';
                $editGate = 'data_realisasi_edit';
                $deleteGate = 'data_realisasi_delete';
                $crudRoutePart = 'data-realisasis';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            
            $table->editColumn('tahun', function ($row) {
                return $row->tahun ? $row->tahun : '';
            });
            $table->editColumn('kdsatker', function ($row) {
                return $row->kdsatker ? $row->kdsatker : '';
            });
            $table->editColumn('ba', function ($row) {
                return $row->ba ? $row->ba : '';
            });
            $table->editColumn('baes_1', function ($row) {
                return $row->baes_1 ? $row->baes_1 : '';
            });
            $table->editColumn('akun', function ($row) {
                return $row->akun ? $row->akun : '';
            });
            $table->editColumn('program', function ($row) {
                return $row->program ? $row->program : '';
            });
            $table->editColumn('kegiatan', function ($row) {
                return $row->kegiatan ? $row->kegiatan : '';
            });
            $table->editColumn('output', function ($row) {
                return $row->output ? $row->output : '';
            });
            $table->editColumn('kewenangan', function ($row) {
                return $row->kewenangan ? $row->kewenangan : '';
            });
            $table->editColumn('sumber_dana', function ($row) {
                return $row->sumber_dana ? $row->sumber_dana : '';
            });
            $table->editColumn('cara_tarik', function ($row) {
                return $row->cara_tarik ? $row->cara_tarik : '';
            });
            $table->editColumn('kdregister', function ($row) {
                return $row->kdregister ? $row->kdregister : '';
            });
            $table->editColumn('lokasi', function ($row) {
                return $row->lokasi ? $row->lokasi : '';
            });
            $table->editColumn('budget_type', function ($row) {
                return $row->budget_type ? $row->budget_type : '';
            });
            $table->editColumn('tanggal', function ($row) {
                return $row->tanggal ? $row->tanggal : '';
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        $breadcrumb = trans('cruds.dataRealisasi.title_singular').' '.trans('global.list');
        return view('admin.dataRealisasis.index', compact('breadcrumb'));
    }

    public function create()
    {
        abort_if(Gate::denies('data_realisasi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.create') ." ". trans('cruds.dataRealisasi.title_singular');
        return view('admin.dataRealisasis.create', compact('breadcrumb'));
    }

    public function store(StoreDataRealisasiRequest $request)
    {
        $dataRealisasi = DataRealisasi::create($request->all());

        return redirect()->route('admin.data-realisasis.index');
    }

    public function edit(DataRealisasi $dataRealisasi)
    {
        abort_if(Gate::denies('data_realisasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.edit') ." ". trans('cruds.dataRealisasi.title_singular');
        return view('admin.dataRealisasis.edit', compact('dataRealisasi', 'breadcrumb'));
    }

    public function update(UpdateDataRealisasiRequest $request, DataRealisasi $dataRealisasi)
    {
        $dataRealisasi->update($request->all());

        return redirect()->route('admin.data-realisasis.index');
    }

    public function show(DataRealisasi $dataRealisasi)
    {
        abort_if(Gate::denies('data_realisasi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.show') ." ". trans('cruds.dataRealisasi.title_singular');
        return view('admin.dataRealisasis.show', compact('dataRealisasi', 'breadcrumb'));
    }

    public function destroy(DataRealisasi $dataRealisasi)
    {
        abort_if(Gate::denies('data_realisasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataRealisasi->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataRealisasiRequest $request)
    {
        DataRealisasi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
