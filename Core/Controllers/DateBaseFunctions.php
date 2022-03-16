<?php

namespace Core\DateString;

use News;

require "./news.php";

class DateBaseFunctions
{
    public function __construct(private News $news)
    {
        //
    }

    public function getNewsByDate(int $page = 1, int $locale): array
    {
        //сортировка по дате
        $pageSet = ($page - 1) * 4;
        $sql = "SELECT * FROM `news`, `news_translate` WHERE `language_id` = {$locale} AND `news`.`id` = `news_id` ORDER BY `date` ASC LIMIT 4 OFFSET $pageSet";
        return mysqli_fetch_all($this->news->query($sql), MYSQLI_ASSOC);
    }

    public function insertDataToDB($str1, $str2, $date, int $locale)
    {
        $this->connection->query(
            "INSERT INTO `news`.`news` (`date`) 
        VALUES ('{$date}');"
        );
        $count = $this->connection->query("SELECT MAX(id) as id FROM news");
        $newsID = 0;

        if ($count->num_rows > 0) {
            $count = $count->fetch_assoc();
            $newsID = $count["id"];
        }

        $this->connection->query(
            "INSERT INTO `news`.`news_translate` (`news_id`, `title`, `content`, `language_id`) 
        VALUES ('{$newsID}', '{$str1}', '{$str2}', '{$locale}');"
        );
    }
}
