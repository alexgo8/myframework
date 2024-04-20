<?php

namespace core;

class RouteFinder
{
  private $controller;
  private $action;
  private $params;

  public function __construct($controller = null, $action = null, $params = null)
  {
    $this->controller = $controller;
    $this->action = $action;
    $this->params = $params;
  }

  public function __get($property)
  {
    return $this->$property;
  }
}