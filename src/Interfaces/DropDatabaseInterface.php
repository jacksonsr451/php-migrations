<?php 

namespace PhpEasyHttp\Models\Migrations\Interfaces;

interface DropDatabaseInterface
{
    public function getQueryString(string $database): string;
}