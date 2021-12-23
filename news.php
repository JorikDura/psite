<?php
include 'StringClass.php';
include 'DateClass.php';
require_once 'db/connection.php';
require_once 'db/DateBaseFunctions.php';
?>
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
    <li><a href="index.php">Формы</a></li>
    <li><a href="news.php">Новости</a></li>
    <li style="float: right;"><a href="#about">About</a></li>
</ul>

<div class="clearfix">
    <div class="box">
    <h2>Новости</h2>
    <ul class="databaselist">
    <?php
    //вывод базы данных
    $listOfNews = getNewsByDate($link);
    if($listOfNews == NULL)
    {
        echo "Тут пока что пусто";
    }
    foreach($listOfNews as $news) : ?>
    <li>
    <h3><?=$news["_title"]?></h3>
    <?=$news["_text"]?><br>
    <p>Дата публикации: <?=$news["_date"]?></p>
    </li>
    <?php endforeach; ?>
    </ul>
    </div>
    <!-- форма для ввода данных -->
    <div class="box">
    <h2>Создать новость</h2>
    <form action="news.php" method="get" autocomplete="off">
    <label for="_title">Введите заголовок:</label><br>
    <input type="text" id="_title" name="_title" placeholder="Введите заголовок..."><br>
    <label for="nstr">Введите текст:</label><br>
    <input type="text" id="_text" name="_text" placeholder="Введите текст..."><br>
    <label for="time">Введите дату новости: </label><br>
    <input type="date" id="_date" name="_date" placeholder="Ваша дата..."><br>
    <input disabled type="submit" value="Отправить">
    </form>
</div>
<br>

<?php
error_reporting(E_ALL);
if(isset($_GET["_title"]) && isset($_GET["_text"]) && isset($_GET["_date"])) {
    $date = htmlspecialchars($_GET["_date"]);
    $str1 = htmlspecialchars($_GET["_text"]);
    $str2 = htmlspecialchars($_GET["_title"]);
    if($date != "" && $str1 != "" && $str2 != "")
    {
        //id ставится автоматически(AUTO_INCREMENT)
        $sqlPath = mysqli_query($link, 
        "INSERT INTO `news` (`id`, `_title`, `_text`, `_date`) 
        VALUES (NULL, '{$str2}', '{$str1}', '{$date}')");
        //header - меняет HTTP-заголовок.
        //использовал чтобы обновить страницу, 
        //а так же не заносить те же данные много раз
        header('Refresh:0; url=news.php');
    }
}
?>
<!-- Подключаем java скрипты -->
<script src="script.js"></script>
</body>
</html