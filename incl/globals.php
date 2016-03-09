<?php

class Globals {
  protected $project = "/albeda_paint";
  
  public $database_php = "/database.php";
  public $sessions_php = "/sessions.php";
  public $header_php = "/header.php";
  public $signin_php = "/signin.php";
  public $signout_php = "/signout.php";
  public $invoices_php = "/invoices.php";
  public $footer_php = "/footer.php";
  public $billing_php = "/billing.php";
  
  private $root;
  private $incl = "/incl";
  private $header = "/header";
  private $signin = "/signin";
  private $invoices = "/invoices";
  private $webpages = "/webpages";
  private $footer = "/footer";

  
  private $loc_incl = "incl";
  private $loc_signin = "/signin";
  
  public function __construct() {
    $this->root = $_SERVER['DOCUMENT_ROOT'].$this->project;
    $this->dirPaths();
    $this->locPaths();
    $this->inclScripts();
    $this->locScripts();
  }
  
  public function dirPaths() {
    $this->incl = $this->root.$this->incl;
    
    $this->header = $this->incl.$this->header;
    $this->signin = $this->incl.$this->signin;
    $this->invoices = $this->incl.$this->invoices;
    $this->billing = $this->incl.$this->webpages;
    $this->footer = $this->incl.$this->footer;

  }
  
  public function locPaths() {
    $this->loc_signin = $this->loc_incl.$this->loc_signin;
  }
  
  public function inclScripts() {
    $this->database_php = $this->incl.$this->database_php;
    $this->sessions_php = $this->incl.$this->sessions_php;
    
    $this->header_php = $this->header.$this->header_php;
    $this->signin_php = $this->signin.$this->signin_php;
    $this->invoices_php = $this->invoices.$this->invoices_php;
    $this->billing_php = $this->webpages.$this->billing_php;
    $this->footer_php = $this->footer.$this->footer_php;

  }
  
  public function locScripts() {
    $this->signout_php = $this->loc_signin.$this->signout_php;
  }
}

$globals = new Globals();
?>