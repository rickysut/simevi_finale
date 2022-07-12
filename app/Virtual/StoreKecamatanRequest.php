<?php
namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Kecamatan request",
 *      description="Store Kecamatan request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreKecamatanRequest
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
     *      title="kd_kab_id",
     *      description="Kode Kabupaten (see: kabupatens)",
     *      example=1101
     * )
     *
     * @var integer
     */
    public $kd_kab_id;

    /**
     * @OA\Property(
     *      title="kd_kec",
     *      description="Kode Kecamatan",
     *      example=1101010
     * )
     *
     * @var integer
     */
    public $kd_kec;
    
    /**
     * @OA\Property(
     *      title="nm_kec",
     *      description="Nama Kecamatan",
     *      example="TEUPAH SELATAN"
     * )
     *
     * @var string
     */
    public $nama_kec;

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
     *      example="061100"
     * )
     *
     * @var string
     */
    public $kd_bast;
}