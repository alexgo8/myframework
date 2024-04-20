<?php

namespace project\models;

class UserValidator
{
 
  public function validate($data)
  {
    
    $errors = array();

    if (empty($data['name'])) {
      $errors[] = "Поле имя пустое. Пожалуйста введите значение";
    }

    if (empty($data['email'])) {
      $errors[] = "Поле email пустое. Пожалуйста введите значение";
    }

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Поле email должно быть в формате адреса электронной почты";
    }

    return $errors;
  }
  
}
