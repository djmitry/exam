<?php

namespace App;

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
        $_SESSION['csrf_token'] = sha1(uniqid('app'));
        return $_SESSION['csrf_token'];
    }

    /**
     * Validate
     * FIXME: Not work
     */
    public static function validate($token): bool
    {
        return isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] === $token : false;
    }
}