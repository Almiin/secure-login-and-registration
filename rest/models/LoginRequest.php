<?php

/**
 *
 * @OA\Schema(
 *     title="Login request model",
 * )
 */
class Login
{
    /**
     * @OA\Property(
     *     description="Username or Email",
     *     title="usernameOrEmail",
     * )
     *
     * @var string
     */
    private $usernameOrEmail;

    /**
     * @OA\Property(
     *     description="Password",
     *     title="Password",
     * )
     *
     * @var string
     */
    private $pass;

}