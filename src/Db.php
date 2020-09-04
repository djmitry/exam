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
    public static function db(): PDO
    {
        if (!self::$db) {
            self::connect();
        }

        return self::$db;
    }

    /**
     * Insert
     */
    public static function insert(string $table, array $data): bool
    {
        $fields = "`" . implode('`,`', array_keys($data)) . "`";
        $values = substr(str_repeat('?,', count($data)), 0, -1);
        $params = array_values($data);

        $sql = "INSERT INTO `" . $table . "` (" . $fields . ") VALUES(" . $values . ")";
        $stm = Db::db()->prepare($sql);
        return $stm->execute($params);
    } 

    /**
     * Connect
     */
    private static function connect(): void
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
        self::$db = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    } 
}