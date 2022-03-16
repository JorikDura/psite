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

        $this->table = $table;

        $this->columns = implode(",", $params);

        $this->query = "SELECT {$this->columns} FROM {$this->table}";

        return $this->query;
    }

    public function run()
    {
        $this->connection->query($this->query);
    }
}