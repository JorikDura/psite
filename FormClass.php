<?php

class FormClass
{
    public static function getTime($time)
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
        $month = date('m',strtotime($time));
        $time=strtotime($time);
        echo date('d ', $time) . $monthsArray[$month] . date(' Y', $time);
    }
}