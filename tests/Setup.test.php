<?php 

namespace PhpEasyHttp\Models\Migrations;

use PDO;
use PDOException;
use PhpEasyHttp\Models\Migrations\Queries\CreateDatabase;
use PhpEasyHttp\Models\Migrations\Queries\DropDatabase;
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

    public function makeQueryCreateDatabase($database): string
    {
        return (new CreateDatabase())->getQueryString($database);
    }

    public function makeQueryDropDatabase($database): string
    {
        return (new DropDatabase())->getQueryString($database);
    }

    public function testShouldBeSetupInstanceOf(): void
    {
        $setup = new Setup();
        $this->assertInstanceOf(Setup::class, $setup);
    }

    public function testShouldBeSetupHasAttrubute(): void
    {
        $this->assertClassHasAttribute('configs', Setup::class);
    }

    public function testShouldBeSetupHasMethodInit(): void
    {
        $setup = new Setup();
        $this->assertTrue(method_exists($setup, 'init'));
    }

    public function testShouldBeSetupHasMethodExecute(): void
    {
        $setup = new Setup();
        $this->assertTrue(method_exists($setup, 'execute'));
    }

    public function testShouldBeSetupCreateDatabaseAndDropDatabase(): void
    {
        $database = "teste";
        Setup::init([
            'connection' => $this->makeConnection(),
            'dbname' => $database
        ]);
        $this->assertTrue(Setup::execute($this->makeQueryCreateDatabase($database)));
        $this->assertTrue(Setup::execute($this->makeQueryDropDatabase($database)));
    }
}