<?php 

namespace PhpEasyHttp\Models\Migrations;

use PHPUnit\Framework\TestCase;

class MigrationTest extends TestCase
{
    public function testShouldBeMigrationsHasMethodRun(): void
    {
        $this->assertTrue(method_exists(Migration::class, 'read'));
    }
}