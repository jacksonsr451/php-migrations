<?php 

namespace PhpEasyHttp\Models\Migrations;

use PHPUnit\Framework\TestCase;

class MigrationsTest extends TestCase
{
    public function testShouldBeMigrationsHasMethodRun(): void
    {
        $this->assertTrue(method_exists(Migrations::class, 'run'));
    }
}