<?php
spl_autoload_register(function ($class) {
  $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  require $classPath . '.php';  
});
