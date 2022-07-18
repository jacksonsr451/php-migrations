<?php 

namespace PhpEasyHttp\Models\Migrations\Queries;

use PhpEasyHttp\Models\Migrations\Interfaces\DropDatabaseInterface;
use PHPUnit\Framework\TestCase;

class DropDatabaseTest extends TestCase
{
    public function makeDropDatabase(): DropDatabaseInterface
    {
        return new DropDatabase();
    }

    public function makeQueryString(string $database): string
    {
        return "DROP DATABASE IF EXISTS {$database}";
    }

    public function testShouldBeDropDatabaseInstanceOf(): void
    {
        $dropDatabase = $this->makeDropDatabase();
        $this->assertInstanceOf(DropDatabase::class, $dropDatabase);
    }

    public function testDropDatabaseHasMethod(): void
    {
        $dropDatabase = $this->makeDropDatabase();
        $this->assertTrue(method_exists($dropDatabase, 'getQueryString'));
    }

    public function testShouldBeGetQueryStringReturnValues(): void
    {
        $database = "tests";
        $query = $this->makeQueryString($database);
        $dropDatabase = $this->makeDropDatabase();
        $this->assertEquals($query, $dropDatabase->getQueryString($database));
    }
}