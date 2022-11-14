<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKabupatenRequest;
use App\Http\Requests\UpdateKabupatenRequest;
use App\Http\Resources\Admin\KabupatenResource;
use App\Models\Kabupaten;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class KabupatenApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/kabupatens",
     *      operationId="getKabupatenList",
     *      tags={"Kabupaten"},
     *      summary="Get list of Kabupaten",
     *      description="Returns list of Kabupaten",
     *      security={{"simeviToken": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/KabupatenResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function index()
    {
        abort_if(Gate::denies('kabupaten_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KabupatenResource(Kabupaten::select(['id',
        'kd_prop_id',
        'kd_kab',
        'kd_dt1',
        'kd_dt2',
        'nama_kab',
        'lat',
        'lng',
        'kd_bast',
        'kd_kemenkeu'])->get());
    }

    /**
     * @OA\Post(
     *      path="/kabupatens",
     *      operationId="storeKabupaten",
     *      tags={"Kabupaten"},
     *      summary="Create New Kabupaten",
     *      description="Return Kabupaten data",
     *      security={{"simeviToken": {}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreKabupatenRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Kabupaten")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(StoreKabupatenRequest $request)
    {
        $kabupaten = Kabupaten::create($request->all());

        return (new KabupatenResource($kabupaten))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/kabupatens/{id}",
     *      operationId="getKabupatenById",
     *      tags={"Kabupaten"},
     *      summary="Get Kabupaten information",
     *      description="Returns Kabupaten data",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Kabupaten id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Kabupaten")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KabupatenResource($kabupaten->load([]));
    }

    public function showWithProp($prop_id )
    {
        // abort_if(Gate::denies('kabupaten_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KabupatenResource(Kabupaten::select(['id',
        'kd_prop_id',
        'kd_kab',
        'kd_dt1',
        'kd_dt2',
        'nama_kab',
        'lat',
        'lng',
        'kd_bast',
        'kd_kemenkeu'])->where('kd_prop_id', $prop_id)->get());

    }
    /**
     * @OA\Put(
     *      path="/kabupatens/{id}",
     *      operationId="updateKabupaten",
     *      tags={"Kabupaten"},
     *      summary="Update existing Kabupaten",
     *      description="Returns updated Kabupaten data",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Kabupaten id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateKabupatenRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Kabupaten")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(UpdateKabupatenRequest $request, Kabupaten $kabupaten)
    {
        $kabupaten->update($request->all());

        return (new KabupatenResource($kabupaten))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/kabupatens/{id}",
     *      operationId="deleteKabupaten",
     *      tags={"Kabupaten"},
     *      summary="Delete existing Kabupaten",
     *      description="Deletes a record and returns no content",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Kabupaten id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kabupaten->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
