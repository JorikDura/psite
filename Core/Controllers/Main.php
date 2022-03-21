<?php

namespace Core\Controllers;

use Core\Controllers\StringClass;
use Core\Controllers\DateClass;

require_once("Core\Controllers\Render.php");

use function \Core\Controllers\render;

class Main
{
    public static function insertMain()
    {
        $serverResponse = "";
        if (isset($_GET["time"]) && isset($_GET["fstr"]) && isset($_GET["nstr"])) {
            $time = htmlspecialchars($_GET["time"]);
            $str1 = htmlspecialchars($_GET["fstr"]);
            $str2 = htmlspecialchars($_GET["nstr"]);

            if ($time != "" && $str1 != "" && $str2 != "") {
                $strClass = new StringClass($str1);
                $serverResponse .= "<h2>Ответ: </h2>" . "Строка: " . $strClass->text . "<br>" . "Длинна строки: " . $strClass->strLength(
                    ) . "<br>";
                $strClass->addStr($str2);
                $serverResponse .= "Объединим имя и фамилию: " . $strClass->getText(
                    ) . "<br>" . "Дата рождения: " . DateClass::getDate($time);
                $strClass->clearStr();
            } else {
                echo "Не знаю как так вышло, но вы ничего не ввели!";
            }
        }
        echo render("mainTemplate.php", ["serverResponse" => $serverResponse]);
    }
}