<?php 

namespace PhpEasyHttp\Models\Migrations;

class Commands 
{
    public static function main(array $args = []): void
    {
        echo "<pre>";
        print_r($args);
        echo "<pre>";
    }
}