<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRincianOutputRequest;
use App\Http\Requests\StoreRincianOutputRequest;
use App\Http\Requests\UpdateRincianOutputRequest;
use App\Models\RincianOutput;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RincianOutputController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('rincian_output_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RincianOutput::query()->select(sprintf('%s.*', (new RincianOutput())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'rincian_output_show';
                $editGate = 'rincian_output_edit';
                $deleteGate = 'rincian_output_delete';
                $crudRoutePart = 'rincian-outputs';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('idoutp', function ($row) {
                return $row->idoutp ? $row->idoutp : '';
            });
            $table->editColumn('idoutp_1', function ($row) {
                return $row->idoutp_1 ? $row->idoutp_1 : '';
            });
            $table->editColumn('kdgiat', function ($row) {
                return $row->kdgiat ? $row->kdgiat : '';
            });
            $table->editColumn('kdoutput', function ($row) {
                return $row->kdoutput ? $row->kdoutput : '';
            });
            $table->editColumn('nmoutput', function ($row) {
                return $row->nmoutput ? $row->nmoutput : '';
            });
            $table->editColumn('sat', function ($row) {
                return $row->sat ? $row->sat : '';
            });
            $table->editColumn('kdsum', function ($row) {
                return $row->kdsum ? $row->kdsum : '';
            });
            $table->editColumn('thnawal', function ($row) {
                return $row->thnawal ? $row->thnawal : 0;
            });
            $table->editColumn('thnakhir', function ($row) {
                return $row->thnakhir ? $row->thnakhir : 0;
            });
            $table->editColumn('kdmulti', function ($row) {
                return $row->kdmulti ? $row->kdmulti : 0;
            });
            $table->editColumn('kdjnsout', function ($row) {
                return $row->kdjnsout ? $row->kdjnsout : 0;
            });
            $table->editColumn('kdikk', function ($row) {
                return $row->kdikk ? $row->kdikk : 0;
            });
            $table->editColumn('kdtema', function ($row) {
                return $row->kdtema ? $row->kdtema : 0;
            });
            $table->editColumn('kdcttout', function ($row) {
                return $row->kdcttout ? $row->kdcttout : 0;
            });
            $table->editColumn('thang', function ($row) {
                return $row->thang ? $row->thang : 0;
            });
            $table->editColumn('kdpn', function ($row) {
                return $row->kdpn ? $row->kdpn : 0;
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        $breadcrumb = trans('cruds.rincianOutput.title_singular') ." ". trans('global.list');
        return view('admin.rincianOutputs.index', compact('breadcrumb'));
    }

    public function create()
    {
        abort_if(Gate::denies('rincian_output_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.create')." ".trans('cruds.rincianOutput.title_singular');
        return view('admin.rincianOutputs.create', compact('breadcrumb'));
    }

    public function store(StoreRincianOutputRequest $request)
    {
        $rincianOutput = RincianOutput::create($request->all());

        return redirect()->route('admin.rincian-outputs.index');
    }

    public function edit(RincianOutput $rincianOutput)
    {
        abort_if(Gate::denies('rincian_output_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.edit')." ".trans('cruds.rincianOutput.title_singular');
        return view('admin.rincianOutputs.edit', compact('breadcrumb','rincianOutput'));
    }

    public function update(UpdateRincianOutputRequest $request, RincianOutput $rincianOutput)
    {
        $rincianOutput->update($request->all());

        return redirect()->route('admin.rincian-outputs.index');
    }

    public function show(RincianOutput $rincianOutput)
    {
        abort_if(Gate::denies('rincian_output_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumb = trans('global.show')." ".trans('cruds.rincianOutput.title_singular');
        return view('admin.rincianOutputs.show', compact('breadcrumb','rincianOutput'));
    }

    public function destroy(RincianOutput $rincianOutput)
    {
        abort_if(Gate::denies('rincian_output_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rincianOutput->delete();

        return back();
    }

    public function massDestroy(MassDestroyRincianOutputRequest $request)
    {
        RincianOutput::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
