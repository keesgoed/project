<?php

class Sessions {
  public $username;
  
  public function __construct() {
    if(isset($_SESSION['signedin'])) {
      session_start();
      $this->accounts();
    }
  }
  
  public function accounts() {
    $this->username = $_SESSION['signedin']['username'];
  }
}

$sessions = new Sessions();
?>