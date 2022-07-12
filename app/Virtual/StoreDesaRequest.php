<?php
namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Desa request",
 *      description="Store Desa request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreDesaRequest
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="kd_kec_id",
     *      description="Kode Kecamatan (see: kecamatans)",
     *      example=1101010
     * )
     *
     * @var integer
     */
    public $kd_kec_id;

    /**
     * @OA\Property(
     *      title="kd_desa",
     *      description="Kode Desa",
     *      example=1101010001
     * )
     *
     * @var integer
     */
    public $kd_desa;

    
    /**
     * @OA\Property(
     *      title="nm_desa",
     *      description="Nama Desa",
     *      example="LATIUNG"
     * )
     *
     * @var string
     */
    public $nm_desa;

    /**
     * @OA\Property(
     *      title="lat",
     *      description="latitude",
     *      example=4.6899999999999995
     * )
     *
     * @var double
     */
    public $lat;

    /**
     * @OA\Property(
     *      title="lng",
     *      description="longitude",
     *      example=96.74
     * )
     *
     * @var double
     */
    public $lng;

    /**
     * @OA\Property(
     *      title="kd_bast",
     *      description="Kode BAST",
     *      example="061101AA"
     * )
     *
     * @var string
     */
    public $kd_bast;

    
    /**
     * @OA\Property(
     *      title="kd_kemenkeu",
     *      description="Kode Kemenkeu",
     *      example="0609"
     * )
     *
     * @var string
     */
    public $kd_kemenkeu;
}