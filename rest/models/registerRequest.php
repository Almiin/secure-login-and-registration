<?php

/**
 *
 * @OA\Schema(
 *     title="Login request model",
 * )
 */
class Register
{
    /**
     * @OA\Property(
     *     description="name",
     *     title="name",
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     description="username",
     *     title="username",
     * )
     *
     * @var string
     */
    private $username;

      /**
     * @OA\Property(
     *     description="email",
     *     title="email",
     * )
     *
     * @var string
     */
    private $email;

      /**
     * @OA\Property(
     *     description="phone number",
     *     title="phone number",
     * )
     *
     * @var string
     */
    private $phone;

      /**
     * @OA\Property(
     *     description="password",
     *     title="password",
     * )
     *
     * @var string
     */
    private $pass;

      /**
     * @OA\Property(
     *     description="repeat password",
     *     title="repeat password",
     * )
     *
     * @var string
     */
    private $rpass;
}