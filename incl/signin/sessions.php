<?php

class Sessions {
  public $username;
  
  private $signedin;
  
  public function __construct($signedin) {
    $this->signedin = $signedin;
    
    if(isset($this->signedin)) {
      session_start();
      $this->accounts();
    }
  }
  
  public function accounts() {
    $this->username = $this->signedin['username'];
  }
}
?>