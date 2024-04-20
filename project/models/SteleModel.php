<?php

namespace project\models;


class SteleModel
{
  private $connect;

  public function __construct($db)
  {
    $this->connect = $db;
  }
  public function getAllSteles()
  {
    $query = 'SELECT * FROM steles';
    $statement = $this->connect->prepare($query);
    $statement->execute(); // предварительный запрос, вернёт 1 если запрос вернул результат
    $rows = $statement->fetchAll($this->connect::FETCH_ASSOC);
    return $rows;
  }
  public function addUser($username, $email)
  {
    // $query = 'INSERT INTO users (username, email) VALUES (:username, :email)';
    // $stmt = $this->connect->prepare($query);
    // $stmt->bindParam(':username', $username);
    // $stmt->bindParam(':email', $email);

    // if ($stmt->execute()) { 
    //   return true;
    // }

    // return false;
  }  
}