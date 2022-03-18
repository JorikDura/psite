<?php
namespace Core\Controllers;

class NewsController
{
    protected $news;

    public function __construct()
    {
        $this->news = new \Core\Models\News();
    }

    protected function selectNews($langID)
    {
        $query = $this->news->select("*");

        $query = $query . " INNER JOIN {$this->news->innerTable} ON {$this->news->newsID} = {$this->news->newsTransID} WHERE {$this->news->newsTransLangID} = {$langID}";

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

    function getNews(int $locale, int $page = 1): array
    {
        $pageSet = ($page - 1) * 4;

        $this->selectNews($locale);

        $this->news->query .= " ORDER BY `date` ASC LIMIT 4 OFFSET $pageSet;";

        $sqlReady = $this->news->get($this->news->query);

        $this->news->clear();

        return $sqlReady;
    }
}