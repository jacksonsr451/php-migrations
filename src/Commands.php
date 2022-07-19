<?php 

namespace PhpEasyHttp\Models\Migrations;

class Commands 
{
    public static function main(array $args = []): void
    {
        self::select($args);
    }

    private static function select(array $args = []): void
    {
        switch ($args[1]) {
            case 'help':
                self::runHelp();
                break;
            case 'init':
                self::runInit();
                break;
            default:
                print_r("Pleasse select a option!\n");
                print_r("help - For more info!");
                print_r("\n\n");
                break;
        }
    }

    public static function runInit(): void
    {
        (new MakeMigration())->init();
    }

    private static function runHelp(): void
    {
        print_r("This is migrations by PHP \n");
        print_r("Select a option by run \n\n");
        print_r("init - Initialize migrations folder \n");
        print_r("init - Initialize migrations folder \n");
        print_r("init - Initialize migrations folder \n");
        print_r("\n");
    }
}