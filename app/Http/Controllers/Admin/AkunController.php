<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAkunRequest;
use App\Http\Requests\StoreAkunRequest;
use App\Http\Requests\UpdateAkunRequest;
use App\Models\Akun;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AkunController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        
        abort_if(Gate::denies('akun_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Akun::query()->select(sprintf('%s.*', (new Akun())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'akun_show';
                $editGate = 'akun_edit';
                $deleteGate = 'akun_delete';
                $crudRoutePart = 'akuns';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('kd_akun', function ($row) {
                return $row->kd_akun ? $row->kd_akun : '';
            });
            $table->editColumn('nama_akun', function ($row) {
                return $row->nama_akun ? $row->nama_akun : '';
            });
            
            $table->editColumn('pendekatan', function ($row) {
                return $row->pendekatan ? Akun::PENDEKATAN_SELECT[$row->pendekatan] : '';
            });
            $table->editColumn('jenis', function ($row) {
                return $row->jenis ? $row->jenis : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Akun::STATUS_SELECT[$row->status] : 'Non-Aktif';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        $breadcrumb = trans('cruds.akun.title_singular') ." ". trans('global.list');
        return view('admin.akuns.index', compact('breadcrumb'));
    }

    public function create()
    {
        abort_if(Gate::denies('akun_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.create')." ".trans('cruds.akun.title_singular');
        return view('admin.akuns.create', compact('breadcrumb'));
    }

    public function store(StoreAkunRequest $request)
    {
        $akun = Akun::create($request->all());

        return redirect()->route('admin.akuns.index');
    }

    public function edit(Akun $akun)
    {
        abort_if(Gate::denies('akun_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        $breadcrumb = trans('global.edit')." ".trans('cruds.akun.title_singular');
        return view('admin.akuns.edit', compact('akun', 'breadcrumb'));
    }

    public function update(UpdateAkunRequest $request, Akun $akun)
    {
        $akun->update($request->all());

        return redirect()->route('admin.akuns.index');
    }

    public function show(Akun $akun)
    {
        abort_if(Gate::denies('akun_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $breadcrumb = trans('global.show')." ".trans('cruds.akun.title_singular');
        return view('admin.akuns.show', compact('akun', 'breadcrumb'));
    }

    public function destroy(Akun $akun)
    {
        abort_if(Gate::denies('akun_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akun->delete();

        return back();
    }

    public function massDestroy(MassDestroyAkunRequest $request)
    {
        Akun::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
