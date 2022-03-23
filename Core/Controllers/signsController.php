<?php

namespace Core\Controllers;

class signsController
{
    protected $signs;

    public function __construct()
    {
        $this->signs = new \Core\Models\Signs();
    }

    function insertDataToSigns($str1, $str2)
    {
        $query = $this->signs->insert(
            $this->signs->DBName,
            $this->signs->table,
            $this->signs->signsLogin,
            $this->signs->signsPassword
        );

        $this->signs->query = $query . " ('{$str1}', '{$str2}');";

        $this->signs->run($this->signs->query);

        $this->signs->clear();
    }
}