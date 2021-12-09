<?php

class FormClass
{
    public $time;
    public $monthsArray = array(
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

    function __construct($time)
    {
        $this->time = $time;
    }

    function getTime()
    {
        $month = date('m',strtotime($this->time));
        $this->time=strtotime($this->time);
        echo date('d ', $this->time) . $this->monthsArray[$month] . date(' Y', $this->time);
    }
}