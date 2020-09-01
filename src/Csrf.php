<?php

namespace App;

/**
 * 
 */
class Csrf
{
    public function createToken(): string
    {
        $_SESSION['csrf_token'] = uniqid('app', true);
        return $_SESSION['csrf_token'];
    }

    public function validate($token): bool
    {
        return isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] === $token : false;
    }
}