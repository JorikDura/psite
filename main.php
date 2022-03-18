<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="php">
    <meta name="description" content="AwA">
    <title>nst php ver 0.89564</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- Меню -->
<ul class="sidenav">
    <li><a href="/">Формы</a></li>
    <li><a href="news">Новости</a></li>
    <li style="float: right;"><a href="#about">About</a></li>
</ul>
<div class="clearfix">
    <div class="box">
    <form action="index.php" method="get" autocomplete="off">
    <label for="fstr">Введите имя:</label><br>
    <input type="text" id="fstr" name="fstr" placeholder="Введите имя..."><br>
    <label for="nstr">Введите фамилию:</label><br>
    <input type="text" id="nstr" name="nstr" placeholder="Введите фамилию..."><br>
    <label for="time">Введите дату рождения: </label><br>
    <input type="date" id="time" name="time" placeholder="Ваша дата..."><br>
    <input type="submit" value="Отправить" id="button">
    </form>
    </div>
    <div class="box">
        <?php
        error_reporting(E_ALL);
        /*phpinfo();*/

        if(isset($_GET["time"]) && isset($_GET["fstr"]) && isset($_GET["nstr"])) {
            $time = htmlspecialchars($_GET["time"]);
            $str1 = htmlspecialchars($_GET["fstr"]);
            $str2 = htmlspecialchars($_GET["nstr"]);

            if($time != "" && $str1 != "" && $str2 != "")
            {
                echo "<h2>Ответ: </h2>";
                $strClass = new Core\Controllers\StringClass\StringClass($str1);
                $strClass->printStr();
                echo "Длинна строки: " . $strClass->strLength() . "<br>";
                $strClass->addStr($str2);
                echo "Объединим имя и фамилию: " . $strClass->getText() . "<br>";
                echo "Дата рождения: ";
                Core\Controllers\DateString\DateClass::getDate($time);
                $strClass->clearStr();
            }

            else
            {
                echo "Не знаю как так вышло, но вы ничего не ввели!";
            }
        }
        ?>
    </div>
</div>

<!-- Подключаем java скрипты -->
<!--<script src="script.js"></script>-->
</body>
</html

