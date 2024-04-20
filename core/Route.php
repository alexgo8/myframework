<?php

namespace core;

use core\RouteFinder;

class Route
{
  private $path;
  private $controller;
  private $action;

  public function __construct($path = null, $controller = null, $action = null)
  {
    $this->path = $path;
    $this->controller = $controller;
    $this->action = $action;
  }
  public function __get($property)
  {
    return $this->$property;
  }
  public function getRouteFinder($routes, $url)
  {
    $requestParams = null;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $urlWithoutParams = preg_replace('/\?.*/', '', $url);
      if ($urlWithoutParams != $url) {
        preg_match_all('/[?&]([^&=]+)=([^&=]+)/', $_SERVER['REQUEST_URI'], $matches);
        $requestParams = array();
        for ($i = 0; $i < count($matches[0]); $i++) {
          $requestParams[$matches[1][$i]] = $matches[2][$i];
        }
      }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
      $urlWithoutParams = $url;
      $requestParams = $_POST;
    }

    foreach ($routes as $route) {
      if ($route->path == $urlWithoutParams or $route->path . '/' == $urlWithoutParams) {
        return new RouteFinder($route->controller, $route->action, $requestParams);
      }
    }
    return new RouteFinder('ErrorController', 'error');
  }
}