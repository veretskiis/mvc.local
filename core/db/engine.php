<?php


namespace Core\Db;


use Config;

class Engine
{
    public static $connected;

    public static function init()
    {
        self::$connected = @mysqli_connect(Config::$DB_HOST,
            Config::$DB_LOGIN,
            Config::$DB_PASS,
            Config::$DB_NAME,
            (int)Config::$DB_PORT,
            Config::$DB_SOCKET);
        if(self::$connected){
            self::exec("SET names utf8");
        }
    }

    /**
     * Выполняет sql запрос. Запрос должен быть экранирован ранее
     * @param $sql
     * @return array|bool|\mysqli_result
     */
    public static function exec($sql)
    {
        $result = mysqli_query(self::$connected, $sql);
        if (! is_bool($result)) {
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $result;
        }
        return $result;
    }
}

Engine::init();