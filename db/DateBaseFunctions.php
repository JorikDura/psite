<?php

function getNews($link)
{
    $sql = "SELECT * FROM `news`";
    $result = mysqli_query($link, $sql);
    $News = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return  $News;
}