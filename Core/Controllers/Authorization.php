<?php

namespace Core\Controllers;

use Core\Controllers\StringClass;
use Core\Controllers\DateClass;

class Authorization
{
    public static function Authorization()
    {
        $authResponse = "";
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);

            if ($login != "" && $password != "") {
                $authResponse = "<h2>Ответ:</h2><p>Вы ввели: </p>" . $login . "<br> <p>Так же: </p>" . $password;
            } else {
                echo "Вы ничего не ввели!";
            }
        }

        echo render("AuthorizationTemplate.php", ["authResponse" => $authResponse]);
    }
}