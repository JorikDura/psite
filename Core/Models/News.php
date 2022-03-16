<?php

require "Core/Classes/Model.php";

//SELECT news_translate.id, news_translate.title, news_translate.content, news_translate.language_id
//FROM news_translate
//INNER JOIN news
//ON news.id = news_translate.id
//WHERE news_translate.language_id = 1;

class News extends Model
{

    protected $table = 'news';

    function __construct()
    {

    }

    function selectNews($innerTable, $newsID, $newsTransID, $newsTransLangID, $langID)
    {
        $query = $this->select(
            $this->table,
            "news_translate.id",
            "news_translate.title",
            "news_translate.content",
            "news_translate.language_id"
        );
        $query = $query . "INNER JOIN {$innerTable} ON {$newsID} = {$newsTransID} WHERE {$newsTransLangID} = {$langID};";
        $this->$query = $query;
    }
}