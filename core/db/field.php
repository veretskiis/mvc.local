<?php


namespace Core\Db;


class Field
{
    CONST TYPE_INT = 'int';
    CONST TYPE_VARCHAR = 'varchar';
    CONST TYPE_MEDIUM_TEXT = 'mediumtext';
    CONST TYPE_EMAIL = 'email';

    public $model;
    public $type;

    protected $valid = true;
    protected $value;
    protected $errors = [];

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Валидация установленнго значения
     * @return bool
     */
    public function validate()
    {
        switch ($this->model['type'] ?? false) {
            case self::TYPE_EMAIL:
                if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[] = sprintf("Неверно заполнено поле \"%s\"", $this->model['title']);
                }
        }
        if ($this->model['required'] ?? false) {
            if (empty($this->value)) {
                $this->errors[] = sprintf("Поле \"%s\" является обязательным для заполнения", $this->model['title']);
            }
        }
        return empty($this->errors);
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getErrors()
    {
        return implode(', ', $this->errors);
    }
}