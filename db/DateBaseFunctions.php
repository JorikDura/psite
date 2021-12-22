<?php

function getNewsByDate($link)
{
    //сортировка по дате
    $sql = "SELECT * FROM news
    ORDER BY _date";
    $result = mysqli_query($link, $sql);
    $News = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return  $News;
}