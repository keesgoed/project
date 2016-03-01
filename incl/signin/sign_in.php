<link rel="stylesheet" type="text/css" href="signin.css">

<?php
require_once "database.php";

class Signin extends Database {
  public $username = "Gebruikersnaam";
  public $password = "Wachtwoord";
  
  private $usr;
  private $pwd;
  
  public function __construct() {
    if (isset($_POST['signin'])) {
      $this->usrError();
      $this->pwdError();
      
      if (!empty($_POST['username']) and !empty($_POST['password'])) {
        $this->escString();
      }
    }
  }
  
  public function usrError() {
    if (empty($_POST['username'])) {
      $this->username = "Vul uw gebruiksersnaam in";
    }
  }
  
  public function pwdError() {
    if (empty($_POST['password'])) {
      $this->password = "Vul uw wachtwoord in";
    }
  }
  
  public function escString() {
    $this->usr = $_POST['username'];
    $this->pwd = $_POST['password'];
    
    $this->usr = mysqli_real_escape_string($database->db, $this->usr);
    $this->pwd = mysqli_real_escape_string($database->db, $this->pwd);
  }
}

$signin = new Signin();
?>

<div class="sign-in">
  <h1>Log in uw account</h1>
  <br>
  <form method="post">
    <input type="text" name="username" placeholder="<?php echo $signin->username; ?>">
    <input type="password" name="password" placeholder="<?php echo $signin->password; ?>">
    <input type="submit" name="signin" class="btn-signin" value="Login">
  </form>
</div>