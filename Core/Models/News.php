<?php
namespace Core\Models;
require "Core/Classes/Model.php";

//SELECT * FROM news INNER JOIN news_translate ON news.id = news_translate.news_id WHERE news_translate.language_id = 1 ORDER BY `date` ASC LIMIT 4 OFFSET 0;

class News extends \Core\Classes\Model
{
    public $table = 'news';
}