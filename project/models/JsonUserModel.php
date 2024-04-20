<?php

namespace project\models;

class JsonUserModel
{
  public $jsonFile;
  public function __construct()
  {
    $this->jsonFile = $_SERVER['DOCUMENT_ROOT'] . '/project/database/json/data.json';
  }
  public function getDataArray()
  {    
    if (file_exists($this->jsonFile)) {
      $data = json_decode(file_get_contents($this->jsonFile), true);
    } else {
      $data = array();
    }
    return $data;
  }
  function generateId($data)
  {
    $maxValueId = 0;
    if (!empty($data)) {
      foreach ($data as $value) {
        if ($value['id'] > $maxValueId) {
          $maxValueId = $value['id'];
        }
      }
    }
    return $maxValueId + 1;
  }
}