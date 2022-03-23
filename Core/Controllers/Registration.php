<?php

namespace Core\Controllers;

use Core\Controllers\StringClass;
use Core\Controllers\DateClass;

class Registration
{
    public static function Registration()
    {
        $registResponse = "<h2>Ответ</h2>";
        if (isset($_POST['regLogin']) && isset($_POST['regPassword'])) {
            $login = htmlspecialchars($_POST['regLogin']);
            $password = htmlspecialchars($_POST['regPassword']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            if (!empty($login) && !empty($password)) {
                $DB = new signsController();

                try {
                    $DB->insertDataToSigns($login, $password);
                    $registResponse .= "<p>Вы успешно зарегались</p>";
                }
                catch (\Exception $exception)
                {
                    $registResponse .= "<p>Чет не получилось...</p><br>" . $exception . "<br><p>Возможно такой логин уже существует.</p>";
                }

            } else {
                echo "Вы ничего не ввели!";
            }
        }

        echo render("RegistrationTemplate.php", ["registResponse" => $registResponse]);
    }
}