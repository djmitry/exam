<?php

namespace App;

/**
 * Csrf protection
 */
class Csrf
{
    public static function createToken(): string
    {
        $_SESSION['csrf_token'] = sha1(uniqid('app'));
        return $_SESSION['csrf_token'];
    }

    public static function validate($token): bool
    {
        return isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] === $token : false;
    }
}