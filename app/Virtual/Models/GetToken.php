<?php

namespace App\Virtual\Models;
/**
 * @OA\Schema(
 *     title="GetToken",
 *     description="GetToken model",
 *     @OA\Xml(
 *         name="GetToken"
 *     )
 * )
 */
class GetToken
{

    /**
     * @OA\Property(
     *     title="username",
     *     description="username",
     *     example="user"
     * )
     *
     * @var string
     */
    private $username;

    /**
     * @OA\Property(
     *      title="password",
     *      description="password",
     *      example="secret"
     * )
     *
     * @var string
     */
    public $password;
}