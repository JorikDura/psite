<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="php">
    <meta name="description" content="AwA">
    <title>nst php ver 0.1</title>
    <link rel="stylesheet" href="styles-ver0.1.css">
</head>
<body>

<h1>Простая форма, со скриптом:</h1>
<div class="forma">
<form class="forma1" action="index.php" method="get" autocomplete="off">
    <label for="fstr">Введтие строку:</label><br>
    <input type="text" id="fstr" name="fstr" placeholder="Введите что-нибудь..." required>
    <input type="submit" value="Отправить" onclick="h2hider()">
</form>
</div>


<div class="otvet">
    <h2>Ответ:</h2>


<?php
$str = $_GET['fstr'];
if (isset($str)) { //если есть какое то значение то выполняем
    echo "Вы ввели: " . $str . "<br>";
   /* foreach ((explode(" ", $str)) as $i => $value) { //использую функцию explode(разделительный символ, строка) - превращает строку в массив
        echo $i  . "-" . $value . ", Длина: " . strlen($value) . "<br>";
    }*/
    echo "Колличество символов: " . mb_strlen($str) . "<br>"; //возвращает длину строки
/*    $converted = mb_convert_encoding($str, 'Windows-1251', mb_detect_encoding($str));
    echo mb_strlen($converted) . "<br>";
    echo mb_detect_encoding($converted);*/
}
?>
</div>

</body>
</html

