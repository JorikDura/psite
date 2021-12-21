<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "news";

$link = mysqli_connect($servername, $username, $password, $database);
if(mysqli_connect_errno())
{
    echo "Не удалось подключиться (".mysqli_connect_errno()."): " . mysqli_connect_error();
    exit();
}
