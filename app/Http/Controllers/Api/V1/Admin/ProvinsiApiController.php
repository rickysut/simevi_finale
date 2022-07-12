<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProvinsiRequest;
use App\Http\Requests\UpdateProvinsiRequest;
use App\Http\Resources\Admin\ProvinsiResource;
use App\Models\Provinsi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ProvinsiApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/provinsis",
     *      operationId="getProvinsiList",
     *      tags={"Provinsi"},
     *      summary="Get list of provinsi",
     *      description="Returns list of provinsi",
     *      security={{"simeviToken": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProvinsiResource")
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
        abort_if(Gate::denies('provinsi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProvinsiResource(Provinsi::select('kd_prop','kd_dt1','nm_prop',
        'kd_bast',
        'lat',
        'lng',
        'kd_kemenkeu')->get());
    }

    /**
     * @OA\Post(
     *      path="/provinsis",
     *      operationId="storeProvinsi",
     *      tags={"Provinsi"},
     *      summary="Create New provinsi",
     *      description="Return provinsi data",
     *      security={{"simeviToken": {}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreProvinsiRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Provinsi")
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
    public function store(StoreProvinsiRequest $request)
    {
        $provinsi = Provinsi::create($request->all());

        return (new ProvinsiResource($provinsi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/provinsis/{id}",
     *      operationId="getProvinsiById",
     *      tags={"Provinsi"},
     *      summary="Get provinsi information",
     *      description="Returns provinsi data",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Provinsi id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Provinsi")
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
    public function show(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProvinsiResource($provinsi->load([]));
    }

    /**
     * @OA\Put(
     *      path="/provinsis/{id}",
     *      operationId="updateProvinsi",
     *      tags={"Provinsi"},
     *      summary="Update existing Provinsi",
     *      description="Returns updated Provinsi data",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Provinsi id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateProvinsiRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Provinsi")
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
    public function update(UpdateProvinsiRequest $request, Provinsi $provinsi)
    {
        $provinsi->update($request->all());

        return (new ProvinsiResource($provinsi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/provinsis/{id}",
     *      operationId="deleteProvinsi",
     *      tags={"Provinsi"},
     *      summary="Delete existing Provinsi",
     *      description="Deletes a record and returns no content",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Provinsi id",
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
    public function destroy(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinsi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
