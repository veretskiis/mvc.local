<?php


class Auth
{
    static private $is_admin = false;
    static private $cookie_key;

    CONST ADMIN_LOGIN = 'admin';
    CONST ADMIN_PASS = '123';

    /**
     * Проверяется наличие куки авторизации
     */
    public static function init()
    {
        self::$cookie_key = md5(self::ADMIN_PASS . self::ADMIN_LOGIN);
        if ($_COOKIE[self::$cookie_key]) {
            self::setCookieAdmin();
            self::$is_admin = true;
        }
    }

    /**
     * @return bool
     */
    public static function isAdmin()
    {
        return self::$is_admin;
    }

    /**
     * @param $login
     * @param $pass
     * @return bool
     */
    public static function login($login, $pass)
    {
        if ($login === self::ADMIN_LOGIN && $pass === self::ADMIN_PASS) {
            self::setCookieAdmin();
            self::$is_admin = true;
        }
        return self::$is_admin;
    }

    /**
     * @return bool
     */
    public static function logout()
    {
        self::setCookieAdmin(-1);
        return true;
    }

    /**
     * @param float|int $add_time
     */
    private static function setCookieAdmin($add_time = 15*60)
    {
        setcookie(self::$cookie_key, true, time() + $add_time, '/', $_SERVER['HTTP_HOST']);
    }

}

Auth::init();