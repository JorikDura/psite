<?php

class StringClass
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }
    public function strLength()
    {
        return mb_strlen($this->text);
    }
    public function addStr($newText)
    {
        $this->text = $this->text . " " . $newText . "<br>";
    }
    public function clearStr()
    {
        $this->text = "";
        echo "Строка была очищена." . "<br>";
    }
    public function rewriteStr($newText)
    {
        $this->text = $newText;
    }
    public function printStr()
    {
        echo "Строка: " . $this->text . "<br>";
    }
    public function getText()
    {
        return $this->text;
    }
}