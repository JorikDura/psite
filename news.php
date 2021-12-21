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
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
<ul class="sidenav">
    <li><a href="index.php">Формы</a></li>
    <li><a href="news.php">Новости</a></li>
    <li style="float: right;"><a href="#about">About</a></li>
</ul>
<pre>
<?php
$connection = getNews($link);
var_dump($connection);
?>
</pre>
</body>
</html

