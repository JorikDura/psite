<?php

namespace Core\Controllers;

class StringClass
{
    private $text;

    /**
     * @param string $text
     */

    public function __construct(string $text)
    {
        $this->text = $text;
    }
    public function strLength()
    {
        return mb_strlen($this->text);
    }
    public function addStr(string $newText)
    {
        $this->text .= $newText;
    }
    public function clearStr()
    {
        $this->text = "";
        echo "Строка была очищена." . "<br>";
    }
    public function rewriteStr(string $newText)
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