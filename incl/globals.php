<?php

class Globals {
  public $database_php = "/database.php";
  public $sessions_php = "/sessions.php";
  public $header_php = "/header.php";
  public $signin_php = "/signin.php";
  public $invoices_php = "/invoices.php";
  public $footer_php = "/footer.php";
  
  private $root;
  private $project = "/albeda_paint";
  private $incl = "/incl";
  private $header = "/header";
  private $signin = "/signin";
  private $invoices = "/invoices";
  private $footer = "/footer";
  
  public function __construct() {
    $this->root = $_SERVER['DOCUMENT_ROOT'].$this->project;
    $this->paths();
    $this->scripts();
  }
  
  public function paths() {
    $this->incl = $this->root.$this->incl;
    
    $this->header = $this->incl.$this->header;
    $this->signin = $this->incl.$this->signin;
    $this->invoices = $this->incl.$this->invoices;
    $this->footer = $this->incl.$this->footer;
  }
  
  public function scripts() {
    $this->database_php = $this->incl.$this->database_php;
    $this->sessions_php = $this->incl.$this->sessions_php;
    
    $this->header_php = $this->header.$this->header_php;
    $this->signin_php = $this->signin.$this->signin_php;
    $this->invoices_php = $this->invoices.$this->invoices_php;
    $this->footer_php = $this->footer.$this->footer_php;
  }
}

$globals = new Globals();
?>