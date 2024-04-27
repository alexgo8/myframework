<?php

namespace core;

use core\RouteFinder;

class Route
{
  private $path;
  private $controller;
  private $method;

  public function __construct($path = null, $controller = null, $method = null)
  {
    $this->path = $path;
    $this->controller = $controller;
    $this->method = $method;
  }
  public function __get($property)
  {
    return $this->$property;
  }
  public function getRouteFinder($routesList)
  {
    $baseUrl = $_SERVER['REQUEST_URI'];
    if (isset($_SERVER['REDIRECT_URL'])) {
      $baseUrl = $_SERVER['REDIRECT_URL'];
    }
    $requestData = $_REQUEST;

    foreach ($routesList as $route) {
      if ($route->path == $baseUrl or $route->path . '/' == $baseUrl) {
        return new RouteFinder($route->controller, $route->method, $requestData);
      }
    }
    return new RouteFinder('ErrorController', 'error');
  }
}