<?php

namespace Core\Controllers;

function render($tmpl, array $params = []): string
{
    ob_start();
    extract($params);
    require($tmpl);
    return ob_get_clean();
}