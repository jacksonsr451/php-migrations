<?php 

namespace PhpEasyHttp\Models\Migrations;

use Exception;

class MakeMigration 
{
    private string $path;
    
    public function __construct(string $path = '')
    {
        $this->path = $this->validPath($path);
    }

    private function validPath(string $path): string
    {
        if (! empty($path)) return $path;
        return 'app/Migrations';
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function createFolder(): bool
    {
        $path = str_replace('\\', '/', $this->path);
        try {
            if (! file_exists($path)) mkdir($path, 0777, true);
            return true;
        } catch (Exception $ex) {
            $ex->getMessage();
            return false;
        }
    }

    public function createFileMigrations(): bool
    {
        $file = str_replace('\\', '/', $this->path) . '/Migrations.php';
        try {
            if (! file_exists($file)) file_put_contents($file, $this->contentFileMigration());
            return true;
        } catch (Exception $ex) {
            $ex->getMessage();
            return false;
        }
    }

    public function contentFileMigration(): string
    {
        $namespace = str_replace("/", "\\", $this->path);
        $string = "<?php \n\nnamespace {$namespace};\n\nuse PhpEasyHttp\Models\Migrations\Migration;";
        $string .= "\n\nclass Migrations extends Migration\n{\n";
        $string .= "\tprotected function read(): void\n";
        $string .= "\t{\n\t\t";
        $string .= '$this->migrations = [';
        $string .= "\n\n";
        $string .= "\t\t";
        $string .= "];\n";
        $string .= "\t}";
        $string .= "\n}";
        return $string;
    }

    public function init(): void
    {
        if ($this->createFolder()) {
            if ($this->createFileMigrations()) {}
        }
    }
}