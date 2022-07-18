<?php

namespace PhpEasyHttp\Models\Migrations\Queries;

use PhpEasyHttp\Models\Migrations\Interfaces\CreateDatabaseInterface;
use PHPUnit\Framework\TestCase;

class CreateDatabaseTest extends TestCase
{
    private CreateDatabaseInterface $createDatabase; 

    public function makeCreateDatabase(): CreateDatabaseInterface
    {
        return new CreateDatabase();
    }

    public function testIfCreateDatabaseInstanceOf()
    {
        $this->createDatabase = $this->makeCreateDatabase();
        $this->assertInstanceOf(CreateDatabase::class, $this->createDatabase);
    }
}