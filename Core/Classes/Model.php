<?php

$rqs = require 'config.php';

abstract class Model
{
    protected $connection;

    protected $table;

    protected $columns;

    private $query;

    public function __construct()
    {
        global $rqs;
        //подключаемся к sql
        $this->connection = new mysqli($rqs['servername'], $rqs['username'], $rqs['password']);

        if ($this->connection->connect_error) {
            echo("Ошибка подключения");
        }

        $this->connection->connect($rqs['servername'], $rqs['username'], $rqs['password'], $rqs['dbName']);
    }

    public function select($table, ...$params)
    {
        if (!count($params) > 0) {
            return;
        }

        $this->columns = implode(",", $params);

        $this->query = "SELECT {$this->columns} FROM {$this->table}";

        $this->columns = "";

        return $this->query;
    }

    public function insertDataToDB(string $DataBase, string $table, ...$columns)
    {
        if (!count($columns) > 0) {
            return;
        }

        $this->columns = implode(",", $columns);

        $this->query = "INSERT INTO {$DataBase}.{$table} ($columns) VALUES";

        $this->columns = "";

        return $this->query;
    }

    public function run()
    {
        $this->connection->query($this->query);
    }

    public function runAssoc() :array
    {
        return mysqli_fetch_all($this->connection->query($this->query), MYSQLI_ASSOC);
    }

    public function clear()
    {
        $this->columns = "";

        $this->query = "";
    }
}