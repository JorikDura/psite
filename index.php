<?php

spl_autoload_register();
require_once ("Core/Libs/Render.php");
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
error_reporting(E_ALL);

session_start();

switch ($uri) {
    case "/news":
        \Core\Controllers\News::getNews();
        break;
    case "/reg":
        \Core\Controllers\Registration::Registration();
        break;
    case "/auth":
        \Core\Controllers\Authorization::Authorization();
        break;
    default:
        \Core\Controllers\Main::insertMain();
}