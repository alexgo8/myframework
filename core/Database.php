<?php

namespace core;

use PDO;
use PDOException;

class Database
{
  private $db_connection = DB_CONNECTION;
  private $host = DB_HOST;
  private $db_name = DB_DATABASE;
  private $username = DB_USERNAME;
  private $password = DB_PASSWORD;
  private $connect;
  public function getConnection()
  {
    $this->connect = null;

    try {
      $this->connect = new PDO(
        $this->db_connection . ':host=' . $this->host . ';dbname=' . $this->db_name,
        $this->username,
        $this->password
      );
      $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection Error: ' . $e->getMessage();
    }

    return $this->connect;
  }
}
