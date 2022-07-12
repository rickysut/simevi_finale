<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="KecamatanResource",
 *     description="Kecamatan resource",
 *     @OA\Xml(
 *         name="KecamatanResource"
 *     )
 * )
 */
class KecamatanResource 
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Kecamatan[]
     */
    private $data;
}