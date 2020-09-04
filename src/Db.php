<?php

namespace App;

use Exception;
use PDO;

/**
 * Db
 */
class Db
{
    private static $db;

    /**
     * Get db
     */
    public static function db()
    {
        if (!self::$db) {
            self::create();
        }

        return self::$db;
    }

    /**
     * Create db
     */
    private static function create()
    {
        // try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
            self::$db = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        /* } catch (\PDOException $e) {
            throw new Exception($e->getMessage());
        } */
    } 
}