<?php

abstract class SqlRuler
{
    protected $link;
    abstract function getNewsByDate(int $page = 1, int $locale): array;
    abstract function insertDataToDB($str1, $str2, $date, int $locale);
}