<?php

namespace Core;

use core\Route;
use core\RouterHandler;
use core\View;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require $_SERVER['DOCUMENT_ROOT'] . '/project/config/connection-database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/project/config/autoload-functions.php';
$routes = require $_SERVER['DOCUMENT_ROOT'] . '/project/routes/Routes.php';

$controllerMethodWithParams = (new Route())->getRouteFinder($routes, $_SERVER['REQUEST_URI'],);
$pageContext = (new RouterHandler())->callControllerMethodWithParams($controllerMethodWithParams);
echo (new View)->render($pageContext);