<?php

namespace project\controllers;

use core\PageContext;
use project\models\JsonUserModel;
use project\models\UserValidator;

class CRUDController
{
  public function index()
  {
    $data = new JsonUserModel;
    $dataArray = $data->getDataArray();
    return new PageContext('TestLayout', 'Список пользователей', 'IndexFormView', ['users' => $dataArray]);
  }
  public function create()
  {
    return new PageContext('TestLayout', 'Добавить пользователя', 'CreateFormView');
  }
  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $validationErrors = (new UserValidator)->validate($_POST);

      if (count($validationErrors) == 0) {
        $data = new JsonUserModel;
        $dataArray = $data->getDataArray();
        $newData = array(
          'id' => $data->generateId($dataArray),
          'name' => $_POST['name'],
          'email' => $_POST['email']
        );
        $dataArray[] = $newData;
        $jsonData = json_encode($dataArray, JSON_PRETTY_PRINT);
        file_put_contents($data->jsonFile, $jsonData);
        header("Location: /");
        exit;
      } elseif (count($validationErrors) != 0) {
        return new PageContext('TestLayout', 'Добавить пользователя', 'CreateFormView', ['errors' => $validationErrors, 'post' => $_POST]);
      }
    }
  }
  public function show($params)
  {
    $data = new JsonUserModel;
    $usersArray = $data->getDataArray();
    global $foundUser;
    foreach ($usersArray as $user) {
      if ($user['id'] == $params['id']) {
        $foundUser = $user;
        break;
      }
    }
    return new PageContext('TestLayout', 'Профиль пользователя', 'ShowFormView', ['user' => $foundUser]);
  }
  public function edit($params)
  {
    $data = new JsonUserModel;
    $usersArray = $data->getDataArray();
    global $foundUser;
    foreach ($usersArray as $user) {
      if ($user['id'] == $params['id']) {
        $foundUser = $user;
        break;
      }
    }
    return new PageContext('TestLayout', 'Редактировать профиль пользователя', 'EditFormView', ['user' => $foundUser]);
  }
  public function update($params)
  {    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $validationErrors = (new UserValidator)->validate($_POST);
      if (count($validationErrors) == 0) {
        $data = new JsonUserModel;
        $usersArray = $data->getDataArray();        
        foreach ($usersArray as &$user) {
          if ($user['id'] == $_POST['param']) {
            $user['name'] = $_POST['name'];
            $user['email'] = $_POST['email'];
          }
        }        
        $jsonData = json_encode($usersArray, JSON_PRETTY_PRINT);
        file_put_contents($data->jsonFile, $jsonData);
        header('Location: /form/show?id=' . $_POST['param']);
        exit;        
      } elseif (count($validationErrors) != 0) {
        return new PageContext('TestLayout', 'Редактировать профиль пользователя', 'EditFormView', ['errors' => $validationErrors, 'user' => $_POST]);
      }
    }
  }
  public function delete($params)
  {
    $data = new JsonUserModel;
    $usersArray = $data->getDataArray();
    foreach ($usersArray as $key => $user) {
      if ($user['id'] == $params['id']) {        
        unset($usersArray[$key]);
        break;
      }
    }    
    $jsonData = json_encode($usersArray, JSON_PRETTY_PRINT);
    file_put_contents($data->jsonFile, $jsonData);
    header('Location: /');
    exit;    
  }
}