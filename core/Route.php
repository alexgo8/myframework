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
    $queryParams = null;
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
      if (isset($_SERVER['REDIRECT_QUERY_STRING'])) {
        $queryString = $_SERVER['REDIRECT_QUERY_STRING'];
        $queryParams = array();
        parse_str($queryString, $queryParams);                   
      }      
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
      $urlWithoutParams = $url;
      $queryParams = $_POST;
    }
    // foreach ($routes as $route) {
    //   echo $route->path;
    // }



    foreach ($routes as $route) {
      if ($route->path == $urlWithoutParams or $route->path . '/' == $urlWithoutParams) {
        return new RouteFinder($route->controller, $route->action, $queryParams);
      }
    }
    return new RouteFinder('ErrorController', 'error');
  }
}