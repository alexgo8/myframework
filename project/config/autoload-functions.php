<?php
spl_autoload_register(function ($class) {
  require $_SERVER['DOCUMENT_ROOT'] . '/' . $class . '.php';  
});