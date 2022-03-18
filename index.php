<?php
spl_autoload_register();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


/*render()*/
switch ($uri)
{
    case "/news":
        \Core\Controllers\News::getNews();
        break;
    default:
        require "main.php";
}