<?php
require_once "../globals.php";
require_once $globals->sessions_php;

class Signout extends Sessions {
  
  public function __construct() {
    $this->destSession();
    header("Location: http://".$_SERVER['SERVER_NAME'].$this->project);
  }
}

$signout = new Signout();
?>