<?php

namespace project\controllers;

use core\Database;
use core\PageContext;
use project\models\SteleModel;

class TestController
{
  public function test()  
  {
    $database = new Database();
    $db = $database->getConnection();
    $model = new SteleModel($db);
    $data = $model->getAllSteles();
 
    return new PageContext('TestLayout', 'TestTextTitle', 'TestView', $data);
  }
}