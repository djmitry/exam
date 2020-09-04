<?php

namespace App\components;

/**
 * Csrf protection
 */
class Csrf
{   
    /**
     * Create
     */
    public static function create(): string
    {
        $token = sha1(uniqid('app'));
        $_SESSION['csrf_token'] = $token;
        return $token;
    }

    /**
     * Validate
     */
    public static function validate($token): bool
    {
        return isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] === $token : false;
    }
}