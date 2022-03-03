<?php

$rqs = require 'db/config.php';

class SQLFunctions
{
    private $link;

    public function __construct()
    {
        global $rqs;
        //подключаемся к sql
        $this->link = new mysqli($rqs['servername'], $rqs['username'], $rqs['password']);

        if($this->link->connect_error)
        {
            echo ("Ошибка подключения");
        }

        $sqlCom = "CREATE DATABASE news";

        $newTable = "CREATE TABLE news (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        _title TEXT NOT NULL,
        _text TEXT NOT NULL,
        _date DATE NOT NULL
        )";

        if ($this->link->query($sqlCom)) {
            echo "База данных создана." . "<br>";
        }

        $this->link->connect($rqs['servername'], $rqs['username'], $rqs['password'], $rqs['dbName']);

        if ($this->link->query($newTable)) {
            echo "Таблица успешно создана";
        }
    }

    public function getNewsByDate(int $page = 1): array
    {
        //сортировка по дате
        $pageSet = ($page - 1) * 5;
        $sql = "SELECT * FROM `news` ORDER BY `_date` ASC LIMIT 5 OFFSET $pageSet";
        $News = mysqli_fetch_all($this->link->query($sql), MYSQLI_ASSOC);

        return $News;
    }

    public function insertDataToDB($str1, $str2, $date)
    {
        $this->link->query("INSERT INTO `news` (`id`, `_title`, `_text`, `_date`) 
        VALUES (NULL, '{$str2}', '{$str1}', '{$date}')");
    }
}
