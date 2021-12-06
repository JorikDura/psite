<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="php">
    <meta name="description" content="AwA">
    <title>nst php ver 0.54264</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Формы</h1>
<div class="clearfix">
    <div class="box getForm">
    <form action="index.php" method="get" autocomplete="off">
    <label for="fstr">Введите строку:</label><br>
    <input type="text" id="fstr" name="fstr" placeholder="Введите что-нибудь...">
    <input disabled type="submit" value="Отправить" id="button">
    </form>
    </div>
    <div class="box timeForm">
    <form action="index.php" method="get" autocomplete="off">
    <label for="time">Введите время: </label><br>
    <input type="date" id="time" name="time" placeholder="Ваша дата...">
    <input type="submit" value="Отправить" id="buttonTime">
    </form>
    </div>
</div>


<div class="clearfix">
    <div class="box getForm">
    <?php
    error_reporting(E_ALL);
    /*phpinfo();*/
    if(isset($_GET["fstr"])) {
        echo "<h2>Ответ: </h2>";
        $str = htmlspecialchars($_GET["fstr"]);
        echo "Вы ввели: " . $str . "<br>";
        echo "Количество символов: " . mb_strlen($str) . "<br>"; //возвращает длину строки
}
?>
    </div>
    <div class="box timeForm">
    <?php
    error_reporting(E_ALL);
    if(isset($_GET["time"])) {
        echo "<h2>Ответ: </h2>";
        $times = htmlspecialchars($_GET["time"]);
        $month = date('m',strtotime($times));
        /*var_dump($times);*/
        /*var_dump($month);*/
        $monthsArray = array(
            "01" => "января",
            "02" => "февраля",
            "03" => "марта",
            "04" => "апреля",
            "05" => "мая",
            "06" => "июня",
            "07" => "июля",
            "08" => "августа",
            "09" => "сентября",
            "10" => "октября",
            "11" => "ноября",
            "12" => "декабря"
        );
        $times = strtotime($times);
        echo date('d ', $times) . $monthsArray[$month] . date(' Y', $times);
        /* mktime не используется, так как не может принимать строковый тип данных */
        /* strftime - Функция объявлена УСТАРЕВШЕЙ. */
    }
    ?>
    </div>
</div>

<script src="script.js"></script> <!-- Подключаем java скрипты -->
</body>
</html

