<?php 

namespace PhpEasyHttp\Models\Migrations\Queries;

use PhpEasyHttp\Models\Migrations\Interfaces\DropDatabaseInterface;

class DropDatabase implements DropDatabaseInterface
{
    public function getQueryString(string $database): string
    {
        return "DROP TABLE IF EXISTS {$database}";
    }
}