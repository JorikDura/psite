<?php

namespace Core\Controllers;

function render($tmpl, array $params = []): string
{
    ob_start();
    extract($params);
    require('././Core/Templates/' . $tmpl);
    return ob_get_clean();
}