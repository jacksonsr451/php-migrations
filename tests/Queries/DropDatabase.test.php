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

    public function testShouldBeDropDatabaseInstanceOf()
    {
        $dropDatabase = $this->makeDropDatabase();
        $this->assertInstanceOf(DropDatabase::class, $dropDatabase);
    }
}