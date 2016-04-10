<?php

class Globals {
  protected $project = "/albeda_paint";
  protected $home = "/klanten";
  protected $home_offers = "/offers";
  
  public $tcpdf_php = "/tcpdf.php";
  public $database_php = "/database.php";
  public $sessions_php = "/sessions.php";
  public $nav_php = "/nav.php";
  public $signin_php = "/signin.php";
  public $signout_php = "/signout.php";
  public $customers_php = "/customers.php";
  public $customerslist_php = "/customers_list.php";
  public $customerform_php = "/customer_form.php";
  public $offers_php = "/offers.php";
  public $offerform_php = "/offer_form.php";
  public $offersubmit_php = "/offer_submit.php";
  public $footer_php = "/footer.php";
  
  private $root;
  private $ext = "/ext";
  private $tcpdf = "/tcpdf";
  private $incl = "/incl";
  private $header = "/header";
  private $signin = "/signin";
  private $customers = "/customers";
  private $offers = "/offers";
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
    $this->ext = $this->root.$this->ext;
    $this->tcpdf = $this->ext.$this->tcpdf;
    
    $this->incl = $this->root.$this->incl;
    $this->header = $this->incl.$this->header;
    $this->signin = $this->incl.$this->signin;
    $this->customers = $this->incl.$this->customers;
    $this->offers = $this->incl.$this->offers;
    $this->footer = $this->incl.$this->footer;

  }
  
  public function locPaths() {
    $this->loc_signin = $this->loc_incl.$this->loc_signin;
  }
  
  public function inclScripts() {
    $this->tcpdf_php = $this->tcpdf.$this->tcpdf_php;
    
    $this->database_php = $this->incl.$this->database_php;
    $this->sessions_php = $this->incl.$this->sessions_php;
    $this->nav_php = $this->header.$this->nav_php;
    $this->signin_php = $this->signin.$this->signin_php;

    $this->customers_php = $this->customers.$this->customers_php;
    $this->customerslist_php = $this->customers.$this->customerslist_php;
    $this->customerform_php = $this->customers.$this->customerform_php;

    $this->offers_php = $this->offers.$this->offers_php;
    $this->offerform_php = $this->offers.$this->offerform_php;
    $this->offersubmit_php = $this->offers.$this->offersubmit_php;
    
    $this->footer_php = $this->footer.$this->footer_php;

  }
  
  public function locScripts() {
    $this->signout_php = $this->loc_signin.$this->signout_php;
  }
}

$globals = new Globals();
?>