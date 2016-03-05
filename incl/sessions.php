<?php

class Sessions {
  public $username;
  
  public function __construct() {
    session_start();
    
    if(isset($_SESSION['signedin'])) {
      $this->accounts();
    }
  }
  
  public function accounts() {
    $this->username = $_SESSION['signedin']['username'];
  }
}

$sessions = new Sessions();
?>