<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMasterKegiatanRequest;
use App\Http\Requests\UpdateMasterKegiatanRequest;
use App\Http\Resources\Admin\MasterKegiatanResource;
use App\Models\MasterKegiatan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MasterKegiatanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('master_kegiatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MasterKegiatanResource(MasterKegiatan::all());
    }

    public function store(StoreMasterKegiatanRequest $request)
    {
        $masterKegiatan = MasterKegiatan::create($request->all());

        return (new MasterKegiatanResource($masterKegiatan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MasterKegiatan $masterKegiatan)
    {
        abort_if(Gate::denies('master_kegiatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MasterKegiatanResource($masterKegiatan);
    }

    public function update(UpdateMasterKegiatanRequest $request, MasterKegiatan $masterKegiatan)
    {
        $masterKegiatan->update($request->all());

        return (new MasterKegiatanResource($masterKegiatan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MasterKegiatan $masterKegiatan)
    {
        abort_if(Gate::denies('master_kegiatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $masterKegiatan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
