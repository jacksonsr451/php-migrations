<?php 

namespace PhpEasyHttp\Models\Migrations;

use Exception;
use PHPUnit\Framework\TestCase;

class MakeMigrationTest extends TestCase
{
    public function testShouldBeMakeMigrationsInstanceOf(): void
    {
        $makeMigration = new MakeMigration();
        $this->assertInstanceOf(MakeMigration::class, $makeMigration);
    }

    public function testShouldBeHasMethodGetPathAndReturnValue(): void
    {
        $expected = "app/Migrations";
        $makeMigration = new MakeMigration();

        $this->assertTrue(method_exists($makeMigration, 'getPath'));
        $this->assertTrue(method_exists($makeMigration, 'validPath'));
        $this->assertEquals($expected, $makeMigration->getPath());
    }

    public function testShouldBeHasMethodCreateFolderAndHasCreatedFolder(): void
    {
        $makeMigration = new MakeMigration();
        $this->assertTrue(method_exists($makeMigration, 'createFolder'));
        $this->assertTrue($makeMigration->createFolder());
    }

    public function testShouldBeHasMethodInit(): void
    {
        $makeMigration = new MakeMigration();
        $this->assertTrue(method_exists($makeMigration, 'init'));
    }

    public function testShouldBeHasMethodCreateFileMigrationsAndCreatedFile(): void
    {
        $makeMigration = new MakeMigration();
        $this->assertTrue(method_exists($makeMigration, 'createFileMigrations'));
        $this->assertTrue($makeMigration->createFileMigrations());
    }
}