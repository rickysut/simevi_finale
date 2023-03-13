<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesaRequest;
use App\Http\Requests\UpdateDesaRequest;
use App\Http\Resources\Admin\DesaResource;
use App\Models\Desa;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

    
class DesaApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/desas",
     *      operationId="getDesaList",
     *      tags={"Desa"},
     *      summary="Get list of Desa",
     *      description="Returns list of Desa",
     *      security={{"simeviToken": {}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/DesaResource")
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
        abort_if(Gate::denies('desa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesaResource(Desa::select(['id','kd_kec_id','kd_desa','nm_desa','kd_bast','lat','lng','kd_kemenkeu'])->get());
    }

    /**
     * @OA\Post(
     *      path="/desas",
     *      operationId="storeDesa",
     *      tags={"Desa"},
     *      summary="Create New Desa",
     *      description="Return Desa data",
     *      security={{"simeviToken": {}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreDesaRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Desa")
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
    public function store(StoreDesaRequest $request)
    {
        $desa = Desa::create($request->all());

        return (new DesaResource($desa))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/desas/{id}",
     *      operationId="getDesaById",
     *      tags={"Desa"},
     *      summary="Get Desa information",
     *      description="Returns Desa data",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Desa id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Desa")
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
    public function show( $desa)
    {
        abort_if(Gate::denies('desa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesaResource(Desa::where('kd_desa', $desa)->get());
    }

    public function showWithKec($kec_id)
    {
        //abort_if(Gate::denies('desa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesaResource(Desa::select([
            'id',
            'kd_kec_id',
            'kd_desa',
            'nm_desa',
            'kd_bast',
            'lat',
            'lng',
            'kd_kemenkeu'])->where('kd_kec_id', $kec_id)->get());
    
    }
    

    /**
     * @OA\Put(
     *      path="/desas/{id}",
     *      operationId="updateDesa",
     *      tags={"Desa"},
     *      summary="Update existing Desa",
     *      description="Returns updated Desa data",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Desa id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateDesaRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Desa")
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
    public function update(UpdateDesaRequest $request, Desa $desa)
    {
        $desa->update($request->all());

        return (new DesaResource($desa))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
    
    /**
     * @OA\Delete(
     *      path="/desas/{id}",
     *      operationId="deleteDesa",
     *      tags={"Desa"},
     *      summary="Delete existing Desa",
     *      description="Deletes a record and returns no content",
     *      security={{"simeviToken": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Desa id",
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
    public function destroy(Desa $desa)
    {
        abort_if(Gate::denies('desa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $desa->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
