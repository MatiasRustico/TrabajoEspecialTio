<?php

include_once ('libreria/calculo.php');
include_once ('sections.php');

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la accion Ej: suma/1/2 --> ['suma', 1, 2]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        showHome();
        break;
    case 'sumar':
        sumar($params[1], $params[2]);
        break;
    case 'restar':
        restar($params[1], $params[2]);
        break;
    case 'multiplicar':
        multiplicar($params[1], $params[2]);
        break;
    case 'dividir':
        dividir($params[1], $params[2]);
        break;
    case 'pi':
        showPi();
        break;
    case 'about':
        if (isset($params[1]))
            showAbout($params[1]);
        else
            showAbout();
        break;
    default:
        echo('404 Page not found');
        break;
}
