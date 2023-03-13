<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKecamatanRequest;
use App\Http\Requests\UpdateKecamatanRequest;
use App\Http\Resources\Admin\KecamatanResource;
use App\Models\Kecamatan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KecamatanApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/kecamatans",
     *      operationId="getKecamatanList",
     *      tags={"Kecamatan"},
     *      summary="Get list of Kecamatan",
     *      description="Returns list of Kecamatan",
     *      security={{"simeviToken": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/KecamatanResource")
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
        abort_if(Gate::denies('kecamatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KecamatanResource(Kecamatan::select(['id',
        'kd_kab_id',
        'kd_kec',
        'nm_kec',
        'kd_bast',
        'lat',
        'lng'])->get());
    }

    /**
     * @OA\Post(
     *      path="/kecamatans",
     *      operationId="storeKecamatan",
     *      tags={"Kecamatan"},
     *      summary="Create New Kecamatan",
     *      description="Return Kecamatan data",
     *      security={{"simeviToken": {}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreKecamatanRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Kecamatan")
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
    public function store(StoreKecamatanRequest $request)
    {
        $kecamatan = Kecamatan::create($request->all());

        return (new KecamatanResource($kecamatan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/kecamatans/{id}",
     *      operationId="getKecamatanById",
     *      tags={"Kecamatan"},
     *      summary="Get Kecamatan information",
     *      description="Returns Kecamatan data",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Kecamatan id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Kecamatan")
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
    public function show($kecamatan)
    {
        abort_if(Gate::denies('kecamatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KecamatanResource(Kecamatan::where('kd_kec', $kecamatan)->get());
    }

    public function showWithKab($kab_id)
    {
        return new KecamatanResource(Kecamatan::select(['id',
        'kd_kab_id',
        'kd_kec',
        'nm_kec',
        'kd_bast',
        'lat',
        'lng'])->where('kd_kab_id', $kab_id)->get());
    }

    /**
     * @OA\Put(
     *      path="/kecamatans/{id}",
     *      operationId="updateKecamatan",
     *      tags={"Kecamatan"},
     *      summary="Update existing Kecamatan",
     *      description="Returns updated Kecamatan data",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Kecamatan id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateKecamatanRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Kecamatan")
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
    public function update(UpdateKecamatanRequest $request, Kecamatan $kecamatan)
    {
        $kecamatan->update($request->all());

        return (new KecamatanResource($kecamatan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/kecamatans/{id}",
     *      operationId="deleteKecamatan",
     *      tags={"Kecamatan"},
     *      summary="Delete existing Kecamatan",
     *      description="Deletes a record and returns no content",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Kecamatan id",
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
    public function destroy(Kecamatan $kecamatan)
    {
        abort_if(Gate::denies('kecamatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
