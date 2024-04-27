<?php

namespace core;

use core\RouteFinder;

class RouterHandler
{
  public function  callControllerMethod(RouteFinder $controllerMethod)
  {
    $controllerClassPath = "project\controllers\\" . $controllerMethod->controller;
    $controller = new $controllerClassPath();
    if (method_exists($controller, $controllerMethod->method)) {
      $result = $controller->{$controllerMethod->method}($controllerMethod->params);
      if ($result) {
        return $result;
      } else {
        exit;
      }
    }
  }
}