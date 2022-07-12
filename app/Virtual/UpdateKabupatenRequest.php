<?php
namespace App\Virtual;
/**
 * @OA\Schema(
 *      title="Update Kabupaten request",
 *      description="Update Kabupaten request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UpdateKabupatenRequest
{
    /**
     * @OA\Property(
     *      title="kd_prop_id",
     *      description="Kode Provinsi (see: provinsis)",
     *      example=11
     * )
     *
     * @var integer
     */
    public $kd_prop_id;

    /**
     * @OA\Property(
     *      title="kd_kab",
     *      description="Kode Kabupaten",
     *      example=1101
     * )
     *
     * @var integer
     */
    public $kd_kab;

    
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
     *      title="kd_dt2",
     *      description="Kode Tingkat 2",
     *      example="09"
     * )
     *
     * @var string
     */
    public $kd_dt2;

    /**
     * @OA\Property(
     *      title="nama_kab",
     *      description="Nama Kabupaten",
     *      example="KAB. SIMEULEU"
     * )
     *
     * @var string
     */
    public $nama_kab;

    /**
     * @OA\Property(
     *      title="lat",
     *      description="Latitude",
     *      example=4.6899999999999995
     * )
     *
     * @var double
     */
    public $lat;

    /**
     * @OA\Property(
     *      title="lng",
     *      description="Longitude",
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