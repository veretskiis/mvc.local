<?php
namespace Core;

class Config
{
    public static $DB_HOST = 'localhost';
    public static $DB_LOGIN = 'u0545195';
    public static $DB_PASS = 'Fp!1AnMW';
    public static $DB_NAME = 'u0545195_league';
    public static $DB_PORT = null;
    public static $DB_SOCKET = null;

    private static $app_dir = './application';

    public static function init()
    {

        require_once('core/controller/controller.php');
        require_once('core/route/route.php');
        require_once('core/smarty/Smarty.class.php');
        require_once('core/auth.php');
        require_once('core/db/engine.php');
        require_once('core/db/field.php');
        require_once('core/pagination.php');
        require_once('core/route/router.php');
        self::required('./application');
    }

    private static function required($dir = '.')
    {
        foreach (scandir($dir) as $sub_dir) {
            if (in_array($sub_dir, ['controller', 'model'])) {

                if (is_dir("$dir/$sub_dir")) {
                    foreach (scandir("$dir/$sub_dir") as $files) {
                        if (!in_array($files, ['.', '..'])) {
                            if (!is_dir("$dir/$sub_dir/$files")) {
                                require_once("$dir/$sub_dir/$files");
                            }
                        }
                    }
                }
            }
        }
    }
}

Config::init();