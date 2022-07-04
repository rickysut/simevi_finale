<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDataPaguRequest;
use App\Http\Requests\StoreDataPaguRequest;
use App\Http\Requests\UpdateDataPaguRequest;
use App\Models\DataPagu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DataPaguController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('data_pagu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DataPagu::query()->select(sprintf('%s.*', (new DataPagu())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'data_pagu_show';
                $editGate = 'data_pagu_edit';
                $deleteGate = 'data_pagu_delete';
                $crudRoutePart = 'data-pagus';

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
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        $breadcrumb = trans('cruds.dataPagu.title_singular').' '.trans('global.list');
    
        return view('admin.dataPagus.index', compact('breadcrumb'));
    }

    public function create()
    {
        abort_if(Gate::denies('data_pagu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.create') ." ". trans('cruds.dataPagu.title_singular');
        return view('admin.dataPagus.create', compact('breadcrumb'));
    }

    public function store(StoreDataPaguRequest $request)
    {
        $dataPagu = DataPagu::create($request->all());

        return redirect()->route('admin.data-pagus.index');
    }

    public function edit(DataPagu $dataPagu)
    {
        abort_if(Gate::denies('data_pagu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.edit') ." ". trans('cruds.dataPagu.title_singular');
        return view('admin.dataPagus.edit', compact('dataPagu', 'breadcrumb'));
    }

    public function update(UpdateDataPaguRequest $request, DataPagu $dataPagu)
    {
        $dataPagu->update($request->all());

        return redirect()->route('admin.data-pagus.index');
    }

    public function show(DataPagu $dataPagu)
    {
        abort_if(Gate::denies('data_pagu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.show') ." ". trans('cruds.dataPagu.title_singular');
        return view('admin.dataPagus.show', compact('dataPagu', 'breadcrumb'));
    }

    public function destroy(DataPagu $dataPagu)
    {
        abort_if(Gate::denies('data_pagu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPagu->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataPaguRequest $request)
    {
        DataPagu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
