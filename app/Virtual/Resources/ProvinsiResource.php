<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="ProvinsiResource",
 *     description="Provinsi resource",
 *     @OA\Xml(
 *         name="ProvinsiResource"
 *     )
 * )
 */
class ProvinsiResource 
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Provinsi[]
     */
    private $data;
}