<?php

namespace Core\Controllers;

use Core\Controllers\StringClass;
use Core\Controllers\DateClass;

class Authorization
{
    public static function Authorization()
    {
        $authResponse = "";
        $DB = new signsController();

        if (!isset($_SESSION['auth'])) {
            if (isset($_POST['login']) && isset($_POST['password'])) {
                $login = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['password']);

                if (!empty($login) && !empty($password)) {
                    if ($DB->login($login, $password)) {
                        $authResponse = "Вы вошли.";
                    } else {
                        $authResponse = "Неверный логин или пароль.";
                    }
                } else {
                    echo "Вы ничего не ввели!";
                }
            }
            echo render("AuthorizationTemplate.php", ["authResponse" => $authResponse]);
        } else {
            $authResponse = "Вы залогинены.";
            echo render("AuthComplite.php", ["authResponse" => $authResponse]);
        }
    }
}