<?php

namespace Core\Controllers;

class DateClass
{
    /**
     * @param $date
     * @return string
     */

    public static function getDate($date) : string
    {
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
        $month = date('m',strtotime($date));
        $date = strtotime($date);
        return date('d ', $date) . $monthsArray[$month] . date(' Y', $date) . "<br>";
    }
}