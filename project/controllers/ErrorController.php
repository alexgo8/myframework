<?php

namespace project\controllers;

use core\PageContext;

class ErrorController
{
  public function error()
  {
    return new PageContext('TestLayout', 'Страница 404', 'ErrorView');
  }  
}