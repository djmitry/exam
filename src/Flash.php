<?php

namespace App;

/**
 * Flash messages
 */
class Flash
{
    /**
     * Add
     */
    public function add(string $name, string $value): void
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Get
     */
    public function get(string $name): ?string
    {
        if ($this->has($name)) {
            $result = $_SESSION[$name];
            unset($_SESSION[$name]);
            // echo $result;
            return $result;
        }

        return null;
    }

    /**
     * Check exists
     */
    public function has(string $name): bool
    {
        return isset($_SESSION[$name]);
    }
}