<?php
namespace Application\Controller;

use Application\Model\ApiTask;
use Application\Model\Task;
use Core\Controller\Controller as AbsController;
use Core\Route\Route;

class TaskController extends AbsController
{
    CONST PER_PAGE = 3;
    public function getRoute(): array
    {
        return [
            new Route($this, ['/'])
        ];
    }

    /**
     * Выводит постраничный, отсортированный список задач
     */
    public function actionIndex()
    {
        $task_api = new ApiTask();
        $page = $this->get(\Pagination::PAGE_KEY, 1);

        $sort = $this->get('sort');
        $sort_direction = strtoupper($this->get('sort_direction', 'DESC'));
        setcookie('sort', $sort, time() + 60*60*24*365, '/', $_SERVER['HTTP_HOST']);
        setcookie('sort_direction', $sort_direction, time() + 60*60*24*365, '/', $_SERVER['HTTP_HOST']);

        $list = $task_api->getList($page, self::PER_PAGE, $sort, $sort_direction);
        $count = $task_api->getCount();
        $pagination = new \Pagination($page, self::PER_PAGE, $count);

        $this->view->assign([
            'list' => $list,
            'pagination' => $pagination,
            'sort' => $sort,
            'sort_direction' => $sort_direction,
        ]);
        $this->setTemplate('tasks_list.tpl');
    }

//    public function actionView()
//    {
//        $task_id = $this->get('id', 0, 'get');
//        $task = new Task($task_id);
//        if ($task->getId()) {
//            $this->view->assign([
//                'task' => $task,
//            ]);
//            $this->setTemplate('task.tpl');
//            return;
//        }
//
//        $this->error404();
//    }

    /**
     * Перебирает значения из post, переносит их в задачу и записывает в базу
     * @throws \Exception
     */
    public function actionAdd()
    {

        if ($this->isPost()) {
            $values = $this->getServerValues();
            $task = new Task();

            foreach ($task::$columns as $field => $value) { // перебирает значения из модели
                $task->$field = $values[$field] ?? 0; // переносит значения из запроса
            }
            $success = $task->insert();
            if ($success) {
                $this->reload();
            }
            $this->result['success'] = $success;
            $this->view->assign([
                'task' => $task,
                'success' => $success ?? null,
            ]);
            $this->setTemplate('task_add.tpl');
            return;
        }
        $this->error404();
    }

    public function actionEdit()
    {
        if ($this->adminRedirect()) { // изменять может только админ
            $values = $this->getServerValues();
            $task = new Task($values['id'] ?? 0);
            if ($task->getId()) { // если задача с таким id найдена
                if ($this->isPost()) {
                    foreach ($task::$columns as $field => $value) { // перебирает значения из модели
                        $task->$field = $values[$field] ?? 0; // переносит значения из запроса
                    }
                    $success = $task->update();
                }
                $this->view->assign([
                    'task' => $task,
                    'item' => $task->getValues(),
                    'success' => $success ?? null,
                ]);
                $this->result['success'] = $success ?? null;
                $this->result['replace'] = $this->view->fetch('tasks_item.tpl');
                $this->result['replace_id'] = $task->getId();
                $this->setTemplate('task_edit.tpl');
                return;
            }
            $this->error404('Задача не найдена');
        }
    }
}