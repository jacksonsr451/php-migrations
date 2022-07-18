<?php

namespace PhpEasyHttp\Models\Migrations\Queries;

use PhpEasyHttp\Models\Migrations\Interfaces\CreateDatabaseInterface;

class CreateDatabase implements CreateDatabaseInterface
{
    public static function getQueryString(string $database): string 
    {
        return "CREATE DATABASE IF NOT EXISTS {$database};";
    }
}