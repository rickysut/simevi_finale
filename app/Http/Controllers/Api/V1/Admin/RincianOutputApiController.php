<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRincianOutputRequest;
use App\Http\Requests\UpdateRincianOutputRequest;
use App\Http\Resources\Admin\RincianOutputResource;
use App\Models\RincianOutput;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RincianOutputApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rincian_output_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RincianOutputResource(RincianOutput::all());
    }

    public function store(StoreRincianOutputRequest $request)
    {
        $rincianOutput = RincianOutput::create($request->all());

        return (new RincianOutputResource($rincianOutput))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RincianOutput $rincianOutput)
    {
        abort_if(Gate::denies('rincian_output_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RincianOutputResource($rincianOutput);
    }

    public function update(UpdateRincianOutputRequest $request, RincianOutput $rincianOutput)
    {
        $rincianOutput->update($request->all());

        return (new RincianOutputResource($rincianOutput))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RincianOutput $rincianOutput)
    {
        abort_if(Gate::denies('rincian_output_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rincianOutput->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
