<?php

namespace core;

use core\RouteFinder;

class RouterHandler
{
  public function  callControllerMethodWithParams(RouteFinder $controllerMethodWithParams)
  {
    $controllerClassPath = "project\controllers\\" . $controllerMethodWithParams->controller;
    $controller = new $controllerClassPath();
    if (method_exists($controller, $controllerMethodWithParams->action)) {
      $result = $controller->{$controllerMethodWithParams->action}($controllerMethodWithParams->params);
      if ($result) {
        return $result;
      } else {
        exit;
      }
    }
  }
}