<?php

class Sessions {
  public $username;
  
  private $signedin;
  
  public function __construct($signedin) {
    if(isset($signedin)) {
      session_start();
      $this->accounts();
    }
  }
  
  public function accounts() {
    $this->username = $_SESSION['signedin']['username'];
  }
}
?>