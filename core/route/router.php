<?php

namespace Core\Route;

use Core\Controller\Controller;

class Router
{
    static $routes = [];
    static $controller_dir = 'application/controller';

    /**
     *
     */
    public static function init()
    {
        foreach (scandir(self::$controller_dir) as $controller_file_name) {
            if (! in_array($controller_file_name, ['.', '..'])) {
                $file_path = self::$controller_dir."/$controller_file_name";
                require_once($file_path);

                $class = str_replace('/', '\\', $file_path);
                $class = str_replace('.php', '', $class);

                if (class_exists($class) && is_subclass_of($class, Controller::class)) {
                    /** @var Controller $controller */
                    $controller = new $class();
                    self::addRoute($controller->getRoute());
                }
            }
        }
    }

    /**
     * @param array $routes
     */
    private static function addRoute(array $routes = [])
    {
        self::$routes = array_merge($routes, self::$routes);
    }

    /**
     * Разбирает строку запроса и ищет совпадение с маршрутами
     * @throws \ErrorException
     * @throws \SmartyException
     */
    public static function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI']);
        foreach (self::$routes as $index => $route) {
            /** @var $route Route */
            if ($route->is($uri)) {
                $route->apply();
            }
        }
    }

    /**
     * Добавляет/заменяет ключ\значение в строке запроса
     * Возвращает новую строку запроса
     * @param $key
     * @param $value
     * @return string
     */
    public function makeUrl($key, $value)
    {
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $query = $uri['query'] ?? '';
        parse_str($query, $query_arr);

        $query_arr[$key] = $value;
        $query = http_build_query($query_arr);
        return "?$query";
    }
}

Router::init();