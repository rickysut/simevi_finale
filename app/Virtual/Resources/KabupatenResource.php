<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="KabupatenResource",
 *     description="Kabupaten resource",
 *     @OA\Xml(
 *         name="KabupatenResource"
 *     )
 * )
 */
class KabupatenResource 
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Kabupaten[]
     */
    private $data;
}