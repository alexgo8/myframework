<?php

namespace project\controllers;

use project\models\JsonUserModel;


class APIController
{
  public function index()
  {
    $data = new JsonUserModel;
    $usersArray = $data->getDataArray();
    $response_usersArray = array(
      "status" => "success",
      "code" => http_response_code(),
      "data" => $usersArray
    );
    header('Content-Type: application/json');
    echo json_encode($response_usersArray);
  }
  public function create()
  {
    $json = file_get_contents('php://input');
    $userData = json_decode($json, true);
    if ($userData === null && json_last_error() !== JSON_ERROR_NONE) {
      http_response_code(400); 
      echo json_encode(['error' => 'Ошибка при декодировании JSON']);
      return;
    }    
    $data = new JsonUserModel;
    $usersArray = $data->getDataArray();
    $newUser = array(
      'id' => $data->generateId($usersArray),
      'name' => $userData['name'],
      'email' => $userData['email']
    );
    $usersArray[] = $newUser;
    $jsonData = json_encode($usersArray, JSON_PRETTY_PRINT);
    file_put_contents($data->jsonFile, $jsonData);
    echo json_encode(['message' => 'JSON данные успешно обработаны']);
  }
  public function update()
  {
    $json = file_get_contents('php://input');
    $userData = json_decode($json, true);
    if ($userData === null && json_last_error() !== JSON_ERROR_NONE) {
      http_response_code(400);
      echo json_encode(['error' => 'Ошибка при декодировании JSON']);
      return;
    }
    $data = new JsonUserModel;
    $usersArray = $data->getDataArray();
    foreach ($usersArray as $key => $user)
    {
      if ($user['id'] == $userData['id']) {
        $usersArray[$key]['name'] = $userData['name'];
        $usersArray[$key]['email'] = $userData['email'];
      }      
    }
    $jsonData = json_encode($usersArray, JSON_PRETTY_PRINT);
    file_put_contents($data->jsonFile, $jsonData);
    echo json_encode(['message' => 'JSON данные успешно обновлены']);    
  }
  public function delete()
  {
    $json = file_get_contents('php://input');
    $userData = json_decode($json, true);
    if ($userData === null && json_last_error() !== JSON_ERROR_NONE) {
      http_response_code(400);
      echo json_encode(['error' => 'Ошибка при декодировании JSON']);
      return;
    }
    $data = new JsonUserModel;
    $usersArray = $data->getDataArray();
    foreach ($usersArray as $key => $user) {
      if ($user['id'] == $userData['id']) {
        unset($usersArray[$key]);
        break;
      }
    }
    $jsonData = json_encode($usersArray, JSON_PRETTY_PRINT);
    file_put_contents($data->jsonFile, $jsonData);
    echo json_encode(['message' => 'JSON данные успешно удалены']);
  }
}