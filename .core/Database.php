<?php

class Database
{
    private static $instance = null;

    private $connection = null;

    // Запрещаем создание новых экземпляров снаружи класса
    protected function __construct()
    {
        $this->connection = new \PDO(
            'mysql:host=localhost;dbname=hotel;charset=utf8',
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
    }

    // Запрещаем клонирование
    protected function __clone()
    {
    }

    // Запрещаем десериализацию
    protected function __wakeup()
    {
        throw new \BadMethodCallException('Unable to deserialize database connection');
    }

    // Создаем экземпляр класса, хранящий подключение к БД
    public static function getInstance(): Database
    {
        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    // Экземпляр подключения к БД
    public static function connection(): \PDO
    {
        return static::getInstance()->connection;
    }

    // Подготовленное выражение
    public static function prepare($statement): \PDOStatement
    {
        return static::connection()->prepare($statement);
    }

    // ID последней добавленной записи
    public static function lastInsertId(): int
    {
        return intval(static::connection()->lastInsertId());
    }
}
