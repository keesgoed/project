<?php

class Sessions {
  public $username;
  
  private $signedin;
  
  public function __construct($signedin) {
    session_start();
    
    $this->signedin = $signedin;
    
    if(isset($this->signedin)) {
      $this->accounts();
    }
  }
  
  public function accounts() {
    $this->username = $this->signedin['username'];
  }
}
?>