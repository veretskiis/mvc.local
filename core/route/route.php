<?php


namespace Core\Route;


use Core\Controller\Controller;

class Route
{
    public $find = false;
    public $action_key = 'act';

    protected $controller;
    protected $pattern;

    /**
     * Route constructor.
     * @param Controller $controller
     * @param array $pattern
     */
    public function __construct(Controller $controller, array $pattern)
    {
        $this->controller = $controller;
        $this->pattern = $pattern;
        foreach ($this->pattern as &$item) {
            $item = "/^".str_replace('/', '\\/', $item)."$/i";
        }
//        var_dump($this->pattern);
//        die;
    }

    /**
     * Соответствует ли маршрут переданной строке запроса
     * @param array $uri
     * @return bool
     */
    public function is(array $uri)
    {
        foreach ($this->pattern as $pattern) {
            if (preg_match($pattern, $uri['path'], $matches)) {
                $this->find = $matches;
                $this->defineAction($uri['query']);
                return true;
            }
        }
        return false;
    }

    /**
     * Передаёт упрвелние контроллеру
     * @throws \ErrorException
     * @throws \SmartyException
     */
    public function apply()
    {
        $act = 'action' . $this->controller->getAction();
        if (is_callable([$this->controller, $act], null, $action)) {
            echo $this->controller->exec();
            return;
        } else {
            throw new \ErrorException('Указанного действия не существует');
        }
    }

    /**
     * Определяет действиее из строки запроса
     * @param $query
     */
    public function defineAction($query)
    {
        $action = 'index';
        if (!empty($query)) {
            parse_str($query, $query_arr);
            if (array_key_exists($this->action_key, $query_arr)) {
                $action = $query_arr[$this->action_key];
            }
        }
        $this->controller->setAction(ucfirst($action));
    }
}