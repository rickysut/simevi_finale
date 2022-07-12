<?php
namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Provinsi request",
 *      description="Store Provinsi request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreProvinsiRequest
{
    /**
     * @OA\Property(
     *      title="kd_prop",
     *      description="Kode Provinsi",
     *      example="11"
     * )
     *
     * @var integer
     */
    public $kd_prop;

    /**
     * @OA\Property(
     *      title="kd_dt1",
     *      description="Kode Tingkat 1",
     *      example="06"
     * )
     *
     * @var string
     */
    public $kd_dt1;

    /**
     * @OA\Property(
     *      title="nm_prop",
     *      description="Nama provinsi",
     *      example="PROV. ACEH"
     * )
     *
     * @var string
     */
    public $nm_prop;

    /**
     * @OA\Property(
     *      title="kd_bast",
     *      description="Kode BAST",
     *      example="060000"
     * )
     *
     * @var string
     */
    public $kd_bast;

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
     *      title="kd_kemenkeu",
     *      description="Kode Kemenkeu",
     *      example="0600"
     * )
     *
     * @var string
     */
    public $kd_kemenkeu;
}