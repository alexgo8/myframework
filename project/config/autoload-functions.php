<?php
spl_autoload_register(function ($class) {
  require $_SERVER['DOCUMENT_ROOT'] . '/' . $class . '.php';  
});
//функция автозагрузки классов. php автоматически вызывает эту функцию, при  первом обращении к классу. DIRECTORY_SEPARATOR - это константа в PHP, которая содержит разделитель директорий для текущей операционной системы. str_replace - это функция в PHP, которая заменяет все вхождения заданной подстроки в строке на другую подстроку/ пример функции: require $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR , $class) . '.php';