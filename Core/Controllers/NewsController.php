<?php
namespace Core\Controllers;
require "Core/Models/News.php";

class NewsController
{
    protected $news;

    protected $innerTable = "news_translate";

    protected $newsID = "news.id";

    protected $newsTransID = "news_translate.news_id";

    protected $newsTransLangID = "news_translate.language_id";

    public function __construct()
    {
        $this->news = new \Core\Models\News();
    }

    protected function selectNews($langID)
    {
        $query = $this->news->select("*");

        $query = $query . " INNER JOIN {$this->innerTable} ON {$this->newsID} = {$this->newsTransID} WHERE {$this->newsTransLangID} = {$langID}";

        $this->news->query = $query;
    }

    function insertDataToNews($str1, $str2, $date, int $locale)
    {
        $query = $this->news->insert($this->news->table, "news", "date");

        $this->news->query = $query . " ('{$date}');";

        $this->news->run($this->news->query);

        $this->news->clear();

        $count = $this->news->maxIDTable("news");

        $newsID = 0;

        if ($count->num_rows > 0) {
            $count = $count->fetch_assoc();
            $newsID = $count["id"];
        }

        $query = $this->news->insert($this->news->table, "news_translate", "news_id", "title", "content", "language_id");

        $this->news->query = $query . " ('{$newsID}', '{$str1}', '{$str2}', '{$locale}');";

        $this->news->run($this->news->query);

        $this->news->clear();
    }

    function getNews(int $page = 1, int $locale): array
    {
        $pageSet = ($page - 1) * 4;

        $this->selectNews($locale);

        $this->news->query .= " ORDER BY `date` ASC LIMIT 4 OFFSET $pageSet;";

        $sqlReady = $this->news->get($this->news->query);

        $this->news->clear();

        return $sqlReady;
    }
}