<?php
namespace Application\Controller;

use Application\Model\ApiTask;
use Application\Model\Task;
use Core\Controller\Controller as AbsController;
use Core\Route\Route;

class Auth extends AbsController
{
    public function getRoute(): array
    {
        return [
            new Route($this, ['/auth/'])
        ];
    }

    /**
     * Авторизация пользователя
     * Если авторизация успешна, то происходит редирект на $redirect
     */
    public function actionIndex()
    {
        $redirect = $this->get('redirect', '/');
        if (!empty($_POST)) {
            $login = $this->get('login', 'post');
            $pass = $this->get('pass', null, 'post');
            $success = \Auth::login($login, $pass);
            if ($success) {
                if (stripos($redirect, '/auth/')) {
                    $redirect = '/';
                }
                $this->redirect($redirect);
            } else {
                $this->view->assign([
                    'login' => $login,
                    'pass' => $pass,
                    'error' => 'Неверный логин или пароль',
                ]);
            }
        }
        $this->view->assign([
            'redirect' => $redirect
        ]);
        $this->setTemplate('auth.tpl');
    }

    /**
     * Деавторизация и редирект на $redirect
     */
    public function actionLogout()
    {
        $redirect = $this->get('redirect', '/');
        \Auth::logout();
        $this->redirect($redirect);
    }
}