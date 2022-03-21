<?php

namespace Core\Controllers;

class StringClass
{
    public $text;

    /**
     * @param string $text
     */

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function strLength(): int
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
    }

    public function getText(): string
    {
        return $this->text;
    }
}