<?php


namespace Application\Model;


use Core\Db\Engine;

class ApiTask
{
    public static $entity;


    /**
     * ApiTask constructor.
     */
    public function __construct()
    {
        self::$entity = Task::$table_name;
    }

    /**
     * Возвращает список задач с определенной страницы
     * @param int $page
     * @param int $limit
     * @param null $sort
     * @param string $sort_direction
     * @return array|bool|\mysqli_result
     */
    public function getList($page = 1, $limit = 3, $sort = null, $sort_direction = 'DESC')
    {
        // если переданный ключ сортировки не существует в модели, то устанавливаем сортировку по id
        if ($sort === null || !array_key_exists($sort, Task::$model)) {
            $sort = 'id';
        }
        if (!in_array($sort_direction, ['ASC', "DESC"])) {
            $sort_direction = 'DESC';
        }

        $offset = ($page - 1) * $limit;
        $sql = sprintf("SELECT * FROM %s ORDER BY %s %s LIMIT %s OFFSET %s",
            self::$entity,
            mysqli_real_escape_string(Engine::$connected, $sort),
            mysqli_real_escape_string(Engine::$connected, $sort_direction),
            mysqli_real_escape_string(Engine::$connected, $limit),
            mysqli_real_escape_string(Engine::$connected, $offset)
        );
        return Engine::exec($sql);
    }

    /**
     * Возвращает количество задач
     * @return false|int
     */
    public function getCount()
    {
        $sql = sprintf("SELECT COUNT(*) FROM %s ",
            self::$entity
        );
        $count = Engine::exec($sql);
        if (!empty($count)) {
            $count = reset(reset($count));
            return $count;
        }
        return false;
    }
}