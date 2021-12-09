<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="php">
    <meta name="description" content="AwA">
    <title>nst php ver 0.43257</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Формы</h1>
<div class="clearfix">
    <div class="box getForm">
    <form action="index.php" method="get" autocomplete="off" id="formaChka">
    <label for="fstr">Введите строку:</label><br>
    <input type="text" id="fstr" name="fstr" placeholder="Введите что-нибудь..."><br>
    <label for="time">Введите дату: </label><br>
    <input type="date" id="time" name="time" placeholder="Ваша дата...">
    <input disabled type="submit" value="Отправить" id="button">
    </form>
    </div>
    <div class="box timeForm">
        <?php
        include ('FormClass.php');
        error_reporting(E_ALL);
        /*phpinfo();*/
        if(isset($_GET["time"]) && isset($_GET["fstr"])) {
            echo "<h2>Ответ: </h2>";
            $str = htmlspecialchars($_GET["fstr"]);
            echo "Вы ввели: " . $str . "<br>";
            //возвращает длину строки
            echo "Количество символов: " . mb_strlen($str) . "<br>";
            $times = new FormClass($_GET["time"]);
            /* Вызов метода класса для вывода времени. */
            $times->getTime();
        }
        ?>
    </div>
</div>
<!-- Подключаем java скрипты -->
<script src="script.js"></script>
</body>
</html

