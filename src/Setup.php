<?php 

namespace PhpEasyHttp\Models\Migrations;

use Exception;

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
            $connection->exec($query);
            return true;
        }
        catch (Exception $e) {
            $e->getMessage();
            return false;
        }
    }
}