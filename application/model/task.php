<?php
namespace Application\Model;

use Core\Db\Engine;
use Core\Db\Field;

class Task
{
    public $local_id = null;
    protected $_values = [];
    public $errors = [];

    public static $id_key = 'id';
    public static $table_name = 'tasks';

    public static $primary = [
        'id INT(11) AUTO_INCREMENT PRIMARY KEY',
    ];
    public static $model = [
        'email' => [
            'title' => 'Email',
            'model' => "email VARCHAR(30)",
            'type' => Field::TYPE_EMAIL,
            'required' => true,
        ],
        'username' => [
            'title' => 'Имя',
            'model' => 'username VARCHAR(30)',
            'required' => true,
        ],
        'text' => [
            'title' => 'Текст задачи',
            'model' => 'text MEDIUMTEXT',
            'required' => true,
        ],
        'completed' => [
            'title' => 'Выполнена',
            'model' => 'completed INT(1)',
        ],
        'edited' => [
            'title' => 'Изменена',
            'model' => 'edited INT(1)',
            'visible' => false,
        ],
    ];
    public static $columns;

    /**
     * Task constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        $this->createTable();
        $this->local_id = $id;
        $this->load();
    }

    /**
     * Создаёт таблицу для задач в базе
     */
    protected function createTable()
    {
        $columns = self::$model;

        if (!empty(self::$primary)) {
            $columns[self::$id_key] = self::$primary;
        }

        foreach ($columns as $key => $item) {
            self::$columns[$key] = $item['model'];
        }

        $sql = "CREATE TABLE IF NOT EXISTS " . self::$table_name . "( " . implode(', ', self::$columns) . " )";
        Engine::exec($sql);
    }

    /**
     * Записывает новую задачу в базу
     * @return array|bool|\mysqli_result
     */
    public function insert()
    {
        if ($success = $this->beforeWrite()) {
            $values = get_object_vars($this);
            $insert_values = [];
            foreach (self::$model as $key => $value) {
                if (isset($values[$key])) {
                    $sql = mysqli_real_escape_string(Engine::$connected, htmlspecialchars($values[$key]));
                    $insert_values[] = "\"$sql\"";
                }
            }
            $sql = sprintf("INSERT INTO %s (%s) VALUES( %s )",
                self::$table_name,
                implode(", ", array_keys(self::$model)),
                implode(", ", $insert_values)
            );

            $success = Engine::exec($sql);
        }

        return $success;
    }

    /**
     * Обновляет существующую задачу в базе
     * @return array|bool|\mysqli_result
     */
    public function update()
    {
        if (\Auth::isAdmin()) {
            if ($this->local_id !== null) {
                if ($success = $this->beforeWrite('update')) {
                    $values = [];
                    foreach (self::$model as $key => $value) {
                        $values[] = sprintf("%s=\"%s\"",
                            $key,
                            mysqli_real_escape_string(Engine::$connected, htmlspecialchars($this->$key))
                        );
                    }
                    $values = implode(', ', $values);
                    $sql = sprintf("UPDATE %s SET %s WHERE %s=%s",
                        self::$table_name,
                        $values,
                        self::$id_key,
                        $this->local_id
                    );
                    $success = Engine::exec($sql);
                    $this->load();
                }
                return $success;
            }
        }

        return false;
    }

    /**
     * Загружает в объект значения из базы
     */
    public function load()
    {
        if ($this->local_id !== null) {
            $sql = sprintf("SELECT * FROM %s WHERE %s = %s", self::$table_name, self::$id_key, $this->local_id);
            $result = Engine::exec($sql);
            if ($result) {
                $result = reset($result);
                foreach (self::$columns as $key => $item) {
                    $this->$key = $result[$key];
                    $this->_values[$key] = $result[$key];
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->_values;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        $key = self::$id_key;
        return $this->$key;
    }

    /**
     * Производит валидацию значений перед обновлением/вставкой
     * @param null|string $type
     * @return bool
     */
    public function beforeWrite($type = null)
    {
        if ($type == 'update') {
            // Если идёт обновление и предыдущее значение текста задачи не соответствует текущему, то ставим отметку "изменено"
            if ($this->getValues()['text'] != $this->text) {
                $this->edited = 1;
            }
        }
        foreach (self::$model as $key => $item) {
            $field = new Field($item);
            $field->setValue($this->$key);
            if (!$field->validate()) {
                $this->errors[] = $field->getErrors();
            }
        }

        return empty($this->errors);
    }
}