<?php
//ключи
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "news";


//подключаемся к sql
$newLink = mysqli_connect($servername, $username, $password);
//создаем базу данных "news"
$sqlnew = "CREATE DATABASE news";
//создаем в ней таблицу
$newTable = "CREATE TABLE news (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    _title TEXT NOT NULL,
    _text TEXT NOT NULL,
    _date DATE NOT NULL
)";
if(mysqli_query($newLink, $sqlnew))
{
    echo "База данных создана." . "<br>";
}
//подключаемся к выше созданной базе данных
$link = mysqli_connect($servername, $username, $password, $dbName);

if (mysqli_query($link, $newTable)) {
    echo "Таблица успешно создана";
}

if(mysqli_connect_errno())
{
    echo "Не удалось подключиться (".mysqli_connect_errno()."): " . mysqli_connect_error();
    exit();
}