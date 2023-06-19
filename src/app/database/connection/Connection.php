<?php

namespace Activerecord\app\database\connection;

use PDO;
use PDOException;

class Connection
{
    private static PDO $pdo = null;

    public static function connect() : PDO
    {
        try {
            if (!static::$pdo) {
              static::$pdo = new PDO("mysql:host=localhost;dbname=activerecord", "root", "1234", [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
            }

            return static::$pdo;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
