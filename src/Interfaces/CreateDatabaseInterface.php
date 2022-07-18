<?php 

namespace PhpEasyHttp\Models\Migrations\Interfaces;

interface CreateDatabaseInterface 
{
    public static function getQueryString(string $database): string;
}