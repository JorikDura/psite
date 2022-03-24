<?php

namespace Core\Models;

use Core\Classes\Model;

//SELECT * FROM news INNER JOIN news_translate ON news.id = news_translate.news_id WHERE news_translate.language_id = 1 ORDER BY `date` ASC LIMIT 4 OFFSET 0;

class News extends Model
{
    public $DBName = 'news';

    public $table = 'news';

    public $innerTable = "news_translate";

    public $newsID = "news.id";

    public $newsTransID = "news_translate.news_id";

    public $newsTransLangID = "news_translate.language_id";
}