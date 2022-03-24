<?php

namespace Core\Classes;

abstract class Model
{
    protected $connection;

    protected $DBName;

    protected $table;

    protected $columns;

    public $query;

    public function __construct()
    {
        $rqs = require 'config.php';
        //подключаемся к sql
        $this->connection = new \mysqli($rqs['servername'], $rqs['username'], $rqs['password']);

        if ($this->connection->connect_error) {
            echo("Ошибка подключения");
        }

        $this->connection->connect($rqs['servername'], $rqs['username'], $rqs['password'], $rqs['dbName']);
    }

    public function select(...$columns)
    {
        if (!count($columns) > 0) {
            return;
        }

        $this->columns = implode(",", $columns);

        $this->query = "SELECT {$this->columns} FROM {$this->DBName}.{$this->table}";

        $this->columns = "";

        return $this->query;
    }

    public function insert(string $dataBase, string $table, ...$columns)
    {
        if (!count($columns) > 0) {
            return;
        }

        $this->columns = implode(",", $columns);

        $this->query = "INSERT INTO {$dataBase}.{$table} ($this->columns) VALUES";

        $this->columns = "";

        return $this->query;
    }

    public function run($query)
    {
        return $this->connection->query($query);
    }

    public function get($query): array
    {
        return mysqli_fetch_all($this->connection->query($query), MYSQLI_ASSOC);
    }

    public function maxIDTable($table)
    {
        return $this->run("SELECT MAX(id) as id FROM {$table}");
    }

    public function clear()
    {
        $this->columns = null;

        $this->query = null;
    }
}