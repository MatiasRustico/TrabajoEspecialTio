<?php
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
<<<<<<< HEAD
    case 'home':
        showHome();
        break;
    case 'market':
        showMarket();
        break;
=======
    case 'games':
        $controller = new GamesController();
        $controller->showGames();
>>>>>>> 7a14e8632c4ad5042696561dd839bab7ee43c3ab
    default:
        echo('404 Page not found');
        break;
}
