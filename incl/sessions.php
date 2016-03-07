<?php

class Sessions extends Globals {
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
  
  public function destSession() {
    unset($_SESSION['signedin']);
  }
}

$sessions = new Sessions();
?>