<?php
include 'StringClass.php';
include 'DateClass.php';
?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="php">
    <meta name="description" content="AwA">
    <title>nst php ver 0.87463</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Формы</h1>
<div class="clearfix">
    <div class="box getForm">
    <form action="index.php" method="get" autocomplete="off">
    <label for="fstr">Введите имя:</label><br>
    <input type="text" id="fstr" name="fstr" placeholder="Введите имя..."><br>
    <label for="nstr">Введите фамилию:</label><br>
    <input type="text" id="nstr" name="nstr" placeholder="Введите фамилию..."><br>
    <label for="time">Введите дату рождения: </label><br>
    <input type="date" id="time" name="time" placeholder="Ваша дата..."><br>
    <input disabled type="submit" value="Отправить" id="button">
    </form>
    </div>
    <div class="box timeForm">
        <?php
        error_reporting(E_ALL);
        /*phpinfo();*/
        if(isset($_GET["time"]) && isset($_GET["fstr"]) && isset($_GET["nstr"])) {
            echo "<h2>Ответ: </h2>";
            $strClass = new StringClass($_GET["fstr"]);
            $strClass->printStr();
            echo "Длинна строки: " . $strClass->strLength() . "<br>";
            $strClass->addStr($_GET["nstr"]);
            echo "Объединим имя и фамилию: " . $strClass->getText() . "<br>";
            echo "Дата рождения: ";
            DateClass::getTime($_GET["time"]);
            $strClass->clearStr();
        }
        ?>
    </div>
</div>

<!-- Подключаем java скрипты -->
<script src="script1.js"></script>
</body>
</html

