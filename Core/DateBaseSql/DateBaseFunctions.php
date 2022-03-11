<?php

require "sqlRuler.php";
/*namespace Core\DateBaseSql;*/

$rqs = require 'Core/DateBaseSql/config.php';

class DateBaseFunctions extends SqlRuler
{
    public function __construct()
    {
        global $rqs;
        //подключаемся к sql
        $this->link = new mysqli($rqs['servername'], $rqs['username'], $rqs['password']);

        if ($this->link->connect_error) {
            echo("Ошибка подключения");
        }

        $this->link->connect($rqs['servername'], $rqs['username'], $rqs['password'], $rqs['dbName']);
    }

    public function getNewsByDate(int $page = 1, int $locale): array
    {
        //сортировка по дате
        $pageSet = ($page - 1) * 4;
        $sql = "SELECT * FROM `news`, `news_translate` WHERE `language_id` = {$locale} AND `news`.`id` = `news_id` ORDER BY `date` ASC LIMIT 4 OFFSET $pageSet";
        return mysqli_fetch_all($this->link->query($sql), MYSQLI_ASSOC);
    }

    public function insertDataToDB($str1, $str2, $date, int $locale)
    {
        $this->link->query(
            "INSERT INTO `news`.`news` (`date`) 
        VALUES ('{$date}');"
        );
        $count = $this->link->query("SELECT MAX(id) as id FROM news");
        $newsID = 0;

        if($count->num_rows > 0)
        {
            $count = $count->fetch_assoc();
            $newsID = $count["id"];
        }

        $this->link->query(
            "INSERT INTO `news`.`news_translate` (`news_id`, `title`, `content`, `language_id`) 
        VALUES ('{$newsID}', '{$str1}', '{$str2}', '{$locale}');"
        );
    }
}
