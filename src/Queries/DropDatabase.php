<?php 

namespace PhpEasyHttp\Models\Migrations\Queries;

use PhpEasyHttp\Models\Migrations\Interfaces\DropDatabaseInterface;

class DropDatabase implements DropDatabaseInterface
{
    public function getQueryString(string $database): string
    {
        return "DROP DATABASE IF EXISTS {$database}";
    }
}