<?php

class Globals {
  protected $project = "/albeda_paint";
  
  public $database_php = "/database.php";
  public $sessions_php = "/sessions.php";
  public $nav_php = "/nav.php";
  public $signin_php = "/signin.php";
  public $signout_php = "/signout.php";
  public $billing_php = "/billing.php";
  public $customers_php = "/customers.php";
  public $offers_php = "/offers.php";
  public $footer_php = "/footer.php";
  
  private $root;
  private $incl = "/incl";
  private $header = "/header";
  private $signin = "/signin";
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
    $this->webpages = $this->incl.$this->webpages;
    $this->footer = $this->incl.$this->footer;

  }
  
  public function locPaths() {
    $this->loc_signin = $this->loc_incl.$this->loc_signin;
  }
  
  public function inclScripts() {
    $this->database_php = $this->incl.$this->database_php;
    $this->sessions_php = $this->incl.$this->sessions_php;
    
    $this->nav_php = $this->header.$this->nav_php;
    $this->signin_php = $this->signin.$this->signin_php;
    $this->billing_php = $this->webpages.$this->billing_php;
    $this->customers_php = $this->webpages.$this->customers_php;
    $this->offers_php = $this->webpages.$this->offers_php;
    $this->footer_php = $this->footer.$this->footer_php;

  }
  
  public function locScripts() {
    $this->signout_php = $this->loc_signin.$this->signout_php;
  }
}

$globals = new Globals();
?>