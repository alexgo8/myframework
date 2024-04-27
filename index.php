<?php

namespace Core;

use core\Route;
use core\RouterHandler;
use core\View;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require $_SERVER['DOCUMENT_ROOT'] . '/project/config/connection-database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/project/config/autoload-functions.php';
$routesList = require $_SERVER['DOCUMENT_ROOT'] . '/project/routes/RoutesList.php';

$controllerMethod = (new Route())->getRouteFinder($routesList);
$pageContext = (new RouterHandler())->callControllerMethod($controllerMethod);
echo (new View)->render($pageContext);