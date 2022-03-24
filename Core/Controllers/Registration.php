<?php

namespace Core\Controllers;

use Core\Controllers\StringClass;
use Core\Controllers\DateClass;

class Registration
{
    public static function Registration()
    {
        $registResponse = "";
        if (isset($_POST['regLogin']) && isset($_POST['regPassword'])) {
            $login = htmlspecialchars($_POST['regLogin']);
            $password = htmlspecialchars($_POST['regPassword']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            if (!empty($login) && !empty($password)) {
                $DB = new signsController();

                try {
                    $DB->insertDataToSigns($login, $password);
                    $registResponse .= "Вы успешно зарегались";
                }
                catch (\Exception $exception)
                {
                    $registResponse .= "Возможно такой логин уже существует: " . $exception->getMessage();
                }

            } else {
                $registResponse = "Вы ничего не ввели!";
            }
        }

        echo render("RegistrationTemplate.php", ["registResponse" => $registResponse]);
    }
}