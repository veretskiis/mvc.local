<?php


namespace Core\Controller;


use Core\Route\Router;
use RS\Router\Route;

abstract class Controller
{
    protected $action = 'Index';
    protected $template = '';
    /** @var \Smarty */
    protected $view;
    protected $ajax = null;
    protected $result = [];
    protected $main_wrap = true;

    /**
     * Должен возвращать массив с маршрутами контроллера
     * @return array
     */
    abstract function getRoute(): array;

    public function __construct()
    {
        $this->view = new \Smarty();
        $this->view->setTemplateDir('./application/view');
        $this->view->assign([
            'is_admin' => \Auth::isAdmin()
        ]);
    }

    /**
     * Выполняет установленное действие
     * @return false|mixed|string
     * @throws \SmartyException
     */
    public function exec()
    {
        $act = 'action' . $this->action;
        $this->$act();
        if ($this->template) {
            $this->view->assign([
                'ajax' => $this->isAjax(),
                'router' => new Router()
            ]);
            $this->result['html'] =  $this->view->fetch($this->template);
            if ($this->main_wrap && !$this->isAjax()) {
                // Оборачивает установленный шаблон главным шаблоном
                $view = new \Smarty();
                $view->setTemplateDir('./application/view');
                $view->assign([
                    'content' => $this->result['html'],
                    'is_admin' => \Auth::isAdmin(),
                    'ajax' => $this->isAjax(),
                ]);
                $this->result['html'] = $view->fetch('layout.tpl');
            }
        }

        if ($this->isAjax()) { // если аякс, то возвращаем в видем массива
            return json_encode($this->result);
        }
        return $this->result['html'];
    }

    /**
     * @param string $action
     */
    public function setAction(string $action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $template
     */
    public function setTemplate(string $template)
    {
        $this->template = $template;
    }

    /**
     * Бросает исключение
     * @param string $reason
     * @throws \Exception
     */
    public function error404($reason = '')
    {
        throw new \Exception("Страница не найдена. $reason");
    }

    /**
     * Проверяет в запросе наличие ключа 'ajax'
     * @return mixed|null
     */
    public function isAjax()
    {
        if ($this->ajax === null) {
            $this->ajax = $this->get('ajax', false);
        }
        return $this->ajax;
    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return 'POST' == $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param $redirect
     */
    public function redirect($redirect)
    {
        if ($this->isAjax()) {
            $this->result['redirect'] = "$redirect";
        } else {
            header("location: $redirect");
        }
    }

    /**
     * Добавляет секцию перезагрузки
     */
    public function reload()
    {
        $this->result['reload'] = true;
    }

    /**
     * Добавляет редирект на страницу авторизации
     * @return bool
     */
    public function adminRedirect()
    {
        $is_admin = \Auth::isAdmin();
        if (!$is_admin) {
            $this->redirect('/auth/');
        }

        return $is_admin;
    }

    /**
     * Возвращает из запроса значение с ключом $key
     * $type = 'post'|'get'|'cookie'
     * @param $key
     * @param null $default
     * @param null $type
     * @return mixed|null
     */
    public function get($key, $default = null, $type = null)
    {

        if ('application/json' == $_SERVER['CONTENT_TYPE']) {
            $post = json_decode(file_get_contents('php://input'), true);
        } else {
            $post = $_POST;
        }

        $get = $_GET;
        $cookie = $_COOKIE;
        if ($type !== null) {
            if (isset($$type)) {
                return $$type[$key] ?? $default;
            }
            return $default;
        }
        return $get[$key] ?? ($post[$key] ?? ($cookie[$key] ?? $default));
    }

    /**
     * Возвращает все параметры из запроса
     * @return mixed
     */
    protected function getServerValues()
    {
        if ($this->isPost()) {
            if ('application/json' == $_SERVER['CONTENT_TYPE']) {
                $values = json_decode(file_get_contents('php://input'), true);
            } else {
                $values = $_POST;
            }
        } else {
            $values = $_GET;
        }

        return $values;
    }

}