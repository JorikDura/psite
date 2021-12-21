<?php

class DateClass
{
    /**
     * @param $data
     */

    public static function getData($data)
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
        $month = date('m',strtotime($data));
        $data=strtotime($data);
        echo date('d ', $data) . $monthsArray[$month] . date(' Y', $data) . "<br>";
    }
}