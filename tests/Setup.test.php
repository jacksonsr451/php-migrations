<?php 

namespace PhpEasyHttp\Models\Migrations;

use PDO;
use PDOException;
use PHPUnit\Framework\TestCase;

class SetupTest extends TestCase
{
    public function makeConnection(): null|object
    {
        $config = require_once(__DIR__ . "/ConfigTests.php");
        $setup = "mysql:host={$config["host"]};charset={$config["charset"]};";
        try {
            $pdo = new PDO($setup, $config["username"], $config["password"]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $pdo;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function testShouldBeSetupInstanceOf(): void
    {
        $setup = new Setup();
        $this->assertInstanceOf(Setup::class, $setup);
    }
}