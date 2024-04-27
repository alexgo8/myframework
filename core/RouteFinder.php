<?php

namespace core;

class RouteFinder
{
  private $controller;
  private $method;
  private $params;

  public function __construct($controller = null, $method = null, $params = null)
  {
    $this->controller = $controller;
    $this->method = $method;
    $this->params = $params;
  }

  public function __get($property)
  {
    return $this->$property;
  }
}