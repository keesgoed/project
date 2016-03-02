<?php

class Database {
  public $db;
  
  private $hostname = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "albeda_paint";
  
  
  public function connDatabase() {
    $this->db = new mysqli($this->hostname, $this->username, $this->password, $this->database);
  }
  
  public function dbError() {
    if ($this->db->connect_errno > 0) {
      die("Unable to connect to database ".$this->db->connect_error);
    }
  }
}
?>