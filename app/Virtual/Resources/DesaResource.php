<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="DesaResource",
 *     description="Desa resource",
 *     @OA\Xml(
 *         name="DesaResource"
 *     )
 * )
 */
class DesaResource 
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Desa[]
     */
    private $data;
}