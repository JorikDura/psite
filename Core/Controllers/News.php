<?php

namespace Core\Controllers;

use Core\Controllers\NewsController;

require_once("Core\Controllers\Render.php");

use function \Core\Controllers\render;

class News
{
    public static function getNews()
    {
        error_reporting(E_ALL);
        $page = 1;

        if (isset($_POST["page"])) {
            $page = (int)$_POST["page"];

            if ($page < 1) {
                $page = 1;
            }
        }

        $lang = 1;

        if (isset($_COOKIE["kuki"])) {
            if ($_COOKIE["kuki"] == "2") {
                $lang = 2;
            }
        }

        if (isset($_POST["language"])) {
            if ($_POST["language"] == "Русский") {
                $lang = 1;
            }

            if ($_POST["language"] == "Не русский") {
                $lang = 2;
            }
        }

        setcookie("kuki", $lang);

        //вывод базы данных
        $loadedNews = "";
        $DB = new NewsController();
        $listOfNews = $DB->getNews($lang, $page);

        if ($listOfNews == null) {
            echo "Тут пока что пусто";
        }

        foreach ($listOfNews as $news) {
            $loadedNews .= "<li><h3>" . $news["title"] . "</h3>" . $news['content'] . "<p>Дата публикации: " . $news['date'] . "</p>";
        }

        if (isset($_POST["_title"]) && isset($_POST["_text"]) && isset($_POST["_date"])) {
            $date = htmlspecialchars($_POST["_date"]);
            $str1 = htmlspecialchars($_POST["_text"]);
            $str2 = htmlspecialchars($_POST["_title"]);
            $DB = new NewsController();

            if ($date != "" && $str1 != "" && $str2 != "") {
                $DB->insertDataToNews($str2, $str1, $date, $_COOKIE["kuki"]);
                header('Refresh:0; url=/news');
            } else {
                echo "Ты ничего не ввел, шамок.";
            }
        }

        echo render(
            "newsTemplate.php",
            ['news' => $loadedNews, 'page' => $page]
        );
    }
}