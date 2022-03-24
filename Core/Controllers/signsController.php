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

        var_dump($this->signs->query);

        $this->signs->clear();
    }

    function selectSigns($login, $password): bool
    {
        $this->signs->query = $this->signs->select("*");
        $this->signs->query .= " WHERE {$this->signs->signsLogin} = '{$login}';";
        $arr = $this->signs->get($this->signs->query);
        $hash = $arr[0]['password'];
        $this->signs->clear();

        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }

    function login($login, $password): bool
    {
        if ($this->selectSigns($login, $password)) {
            $_SESSION["auth"] = true;
            return true;
        } else {
            return false;
        }
    }
}