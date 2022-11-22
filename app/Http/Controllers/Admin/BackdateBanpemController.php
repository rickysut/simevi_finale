<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBackdateBanpemRequest;
use App\Http\Requests\StoreBackdateBanpemRequest;
use App\Http\Requests\UpdateBackdateBanpemRequest;
use App\Models\Akun;
use App\Models\BackdateBanpem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BackdateBanpemController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('backdate_banpem_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BackdateBanpem::query()->select(sprintf('%s.*', (new BackdateBanpem())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'backdate_banpem_show';
                $editGate = 'backdate_banpem_edit';
                $deleteGate = 'backdate_banpem_delete';
                $crudRoutePart = 'backdate-banpems';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('year', function ($row) {
                return $row->year ? $row->year : '';
            });
            $table->editColumn('kd_satker', function ($row) {
                return $row->kd_satker ? $row->kd_satker : '';
            });
            $table->editColumn('provinsi', function ($row) {
                return $row->provinsi ? $row->provinsi : '';
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
                return $row->total ? number_format($row->total,0,',','.') : '0';
            });
            $table->editColumn('satuan', function ($row) {
                return $row->satuan ? $row->satuan : '';
            });
            $table->editColumn('nominal', function ($row) {
                return $row->nominal ? number_format($row->nominal,0,',','.') : '0';
            });
            $table->editColumn('kd_giat', function ($row) {
                return $row->kd_giat ? $row->kd_giat : '';
            });
            $table->editColumn('kd_akun', function ($row) {
                return $row->kd_akun ? $row->kd_akun : '';
            });
            $table->editColumn('kwn', function ($row) {
                return $row->kwn ? $row->kwn : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        $breadcrumb = trans('cruds.backdateBanpem.title_singular') ." ". trans('global.list');
        return view('admin.backdateBanpems.index', compact('breadcrumb'));
    }

    public function create()
    {
        abort_if(Gate::denies('backdate_banpem_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.create') ." ". trans('cruds.backdateBanpem.title_singular');
        return view('admin.backdateBanpems.create', compact('breadcrumb'));
    }

    public function store(StoreBackdateBanpemRequest $request)
    {
        $backdateBanpem = BackdateBanpem::create($request->all());

        return redirect()->route('admin.backdate-banpems.index');
    }

    public function edit(BackdateBanpem $backdateBanpem)
    {
        abort_if(Gate::denies('backdate_banpem_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.edit') ." ". trans('cruds.backdateBanpem.title_singular');
        return view('admin.backdateBanpems.edit', compact('backdateBanpem', 'breadcrumb'));
    }

    public function update(UpdateBackdateBanpemRequest $request, BackdateBanpem $backdateBanpem)
    {
        $backdateBanpem->update($request->all());

        return redirect()->route('admin.backdate-banpems.index');
    }

    public function show(BackdateBanpem $backdateBanpem)
    {
        abort_if(Gate::denies('backdate_banpem_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.show') ." ". trans('cruds.backdateBanpem.title_singular');
        return view('admin.backdateBanpems.show', compact('backdateBanpem', 'breadcrumb'));
    }

    public function destroy(BackdateBanpem $backdateBanpem)
    {
        abort_if(Gate::denies('backdate_banpem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backdateBanpem->delete();

        return back();
    }

    public function massDestroy(MassDestroyBackdateBanpemRequest $request)
    {
        BackdateBanpem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
