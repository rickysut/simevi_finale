<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMasterKegiatanRequest;
use App\Http\Requests\StoreMasterKegiatanRequest;
use App\Http\Requests\UpdateMasterKegiatanRequest;
use App\Models\MasterKegiatan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MasterKegiatanController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('master_kegiatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MasterKegiatan::query()->select(sprintf('%s.*', (new MasterKegiatan())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'master_kegiatan_show';
                $editGate = 'master_kegiatan_edit';
                $deleteGate = 'master_kegiatan_delete';
                $crudRoutePart = 'master-kegiatans';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('kddept', function ($row) {
                return $row->kddept ? $row->kddept : '';
            });
            $table->editColumn('kdunit', function ($row) {
                return $row->kdunit ? $row->kdunit : '';
            });
            $table->editColumn('kd_kegiatan', function ($row) {
                return $row->kd_kegiatan ? $row->kd_kegiatan : '';
            });
            $table->editColumn('direktorat', function ($row) {
                return $row->direktorat ? $row->direktorat : '';
            });
            $table->editColumn('nomenklatur_giat', function ($row) {
                return $row->nomenklatur_giat ? $row->nomenklatur_giat : '';
            });
            
            $table->editColumn('status', function ($row) {
                return $row->status ? MasterKegiatan::STATUS_SELECT[$row->status] : 'Non-Aktif';
            });
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        $breadcrumb = trans('cruds.masterKegiatan.title_singular') ." ". trans('global.list');
        return view('admin.masterKegiatans.index', compact('breadcrumb'));
    }

    public function create()
    {
        abort_if(Gate::denies('master_kegiatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.create')." ".trans('cruds.masterKegiatan.title_singular');
        return view('admin.masterKegiatans.create', compact('breadcrumb'));
    }

    public function store(StoreMasterKegiatanRequest $request)
    {
        $masterKegiatan = MasterKegiatan::create($request->all());

        return redirect()->route('admin.master-kegiatans.index');
    }

    public function edit(MasterKegiatan $masterKegiatan)
    {
        abort_if(Gate::denies('master_kegiatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.edit')." ".trans('cruds.masterKegiatan.title_singular');
        return view('admin.masterKegiatans.edit', compact('breadcrumb','masterKegiatan'));
    }

    public function update(UpdateMasterKegiatanRequest $request, MasterKegiatan $masterKegiatan)
    {
        $masterKegiatan->update($request->all());

        return redirect()->route('admin.master-kegiatans.index');
    }

    public function show(MasterKegiatan $masterKegiatan)
    {
        abort_if(Gate::denies('master_kegiatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.show')." ".trans('cruds.masterKegiatan.title_singular');
        return view('admin.masterKegiatans.show', compact('breadcrumb','masterKegiatan'));
    }

    public function destroy(MasterKegiatan $masterKegiatan)
    {
        abort_if(Gate::denies('master_kegiatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $masterKegiatan->delete();

        return back();
    }

    public function massDestroy(MassDestroyMasterKegiatanRequest $request)
    {
        MasterKegiatan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}