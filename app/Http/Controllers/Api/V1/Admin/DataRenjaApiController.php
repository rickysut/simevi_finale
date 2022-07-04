<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataRenjaRequest;
use App\Http\Requests\UpdateDataRenjaRequest;
use App\Http\Resources\Admin\DataRenjaResource;
use App\Models\DataRenja;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataRenjaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_renja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataRenjaResource(DataRenja::all());
    }

    public function store(StoreDataRenjaRequest $request)
    {
        $dataRenja = DataRenja::create($request->all());

        return (new DataRenjaResource($dataRenja))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataRenja $dataRenja)
    {
        abort_if(Gate::denies('data_renja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataRenjaResource($dataRenja);
    }

    public function update(UpdateDataRenjaRequest $request, DataRenja $dataRenja)
    {
        $dataRenja->update($request->all());

        return (new DataRenjaResource($dataRenja))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataRenja $dataRenja)
    {
        abort_if(Gate::denies('data_renja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataRenja->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
