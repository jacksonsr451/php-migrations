<?php

namespace PhpEasyHttp\Models\Migrations\Queries;

use PhpEasyHttp\Models\Migrations\Interfaces\CreateDatabaseInterface;
use PHPUnit\Framework\TestCase;


class CreateDatabaseTest extends TestCase
{
    public function makeCreateDatabase(): CreateDatabaseInterface
    {
        return new CreateDatabase();
    }

    public function makeQueryString(string $database): string
    {
        return "CREATE DATABASE IF NOT EXISTS {$database};";
    }

    public function testShouldBeCreateDatabaseInstanceOf(): void
    {
        $createDatabase = $this->makeCreateDatabase();
        $this->assertInstanceOf(CreateDatabase::class, $createDatabase);
    }

    public function testShouldBeCreateDatabaseHasMethodGetQueryString(): void
    {
        $createDatabase = $this->makeCreateDatabase();
        $this->assertTrue(method_exists($createDatabase, 'getQueryString'));
    }

    public function testShouldBeGetQueryStringReturnValueEquals(): void
    {
        $database = "tests";
        $query = $this->makeQueryString($database);
        $createDatabase = $this->makeCreateDatabase();
        $this->assertEquals($query, $createDatabase->getQueryString($database));
    }
}