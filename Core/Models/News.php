<?php

require "Core/Classes/Model.php";

//SELECT news_translate.id, news_translate.title, news_translate.content, news_translate.language_id
//FROM news_translate
//INNER JOIN news
//ON news.id = news_translate.id
//WHERE news_translate.language_id = 1;

class News extends Model
{

    protected $table = 'news_translate';

    protected $innerTable = "news";

    protected $newsID = "news.id";

    protected $newsTransID = "news_translate.id";

    protected $newsTransLangID = "news_translate.language_id";

    protected $langID;

/*    function __construct($innerTable, $newsID, $newsTransID, $newsTransLangID, $langID)
    {
        $this->innerTable = $innerTable;

        $this->newsID = $newsID;

        $this->newsTransID = $newsTransID;

        $this->newsTransLangID = $newsTransLangID;

        $this->langID = $langID;
    }*/

    function selectNews($langID)
    {
        $query = $this->select(
            $this->table,
            "news_translate.id",
            "news_translate.title",
            "news_translate.content",
            "news_translate.language_id"
        );
        $query = $query . " INNER JOIN {$this->innerTable} ON {$this->newsID} = {$this->newsTransID} WHERE {$this->newsTransLangID} = {$langID}";

        $this->query = $query;
    }

    function  insertDataToNews($str1, $str2, $date, int $locale)
    {
        $query = $this->insertDataToDB($this->table, "news", "date");

        $this->query = $query . "VALUES ('{$date}');";

        $this->run();

        $this->clear();

        $count = $this->connection->query("SELECT MAX(id) as id FROM news");
        $newsID = 0;

        if ($count->num_rows > 0) {
            $count = $count->fetch_assoc();
            $newsID = $count["id"];
        }

        $query = $this->insertDataToDB($this->table, "news_translate", "news_id", "title", "content", "language_id");

        $this->query = $query . "VALUES ('{$newsID}', '{$str1}', '{$str2}', '{$locale}');";

        $this->run();
    }

    function getNewsByDate(int $page = 1, int $locale): array
    {
        $pageSet = ($page - 1) * 4;

        $this->selectNews($locale);

        $this->query .= " ORDER BY `date` ASC LIMIT 4 OFFSET $pageSet;";

        var_dump($this->query);

        $sqlReady = $this->runAssoc();

        /*var_dump($sqlReady);*/

        $this->clear();

        return $sqlReady;
    }
}