<?php 

namespace PhpEasyHttp\Models\Migrations;

use PDOException;

class Setup 
{
    private static array $configs;

    public static function init(array $configs = []): void
    {
        self::$configs = $configs;
    }

    public static function execute(string $query): bool
    {
        $connection = self::$configs["connection"];
        try {
            $connection->exec($query) or die(print_r($connection->errorInfo(), true));
            return true;
        }
        catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }
}