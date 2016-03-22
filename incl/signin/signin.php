<?php

class Signin extends Database {
  public $username = "Gebruikersnaam";
  public $password = "Wachtwoord";

  private $usr;
  private $pwd;
  private $sql;
  private $query;
  private $rows;
  private $accounts;
  private $row;

  public function __construct() {
    if(isset($_POST['signin'])) {
      $this->usrError();
      $this->pwdError();

      if(!empty($_POST['username']) and !empty($_POST['password'])) {
        $this->connDatabase();
        $this->dbError();
        $this->escString();
        $this->qryDatabase();
        $this->initSession();
        $this->rowError();
      }
    }
  }

  public function usrError() {
    if(empty($_POST['username'])) {
      $this->username = "Vul uw gebruiksersnaam in";
    }
  }

  public function pwdError() {
    if(empty($_POST['password'])) {
      $this->password = "Vul uw wachtwoord in";
    }
  }

  public function escString() {
    $this->usr = $_POST['username'];
    $this->pwd = $_POST['password'];

    $this->usr = mysqli_real_escape_string($this->db, $this->usr);
    $this->pwd = mysqli_real_escape_string($this->db, $this->pwd);
  }

  public function qryDatabase() {
    $this->sql = "
      SELECT a.accounts_id, a.username, a.password
			FROM accounts AS a
			WHERE a.username = '".$this->usr."'
				AND a.password = '".$this->pwd."'
    ";

    $this->query = mysqli_query($this->db, $this->sql);

    while($this->rows = mysqli_fetch_assoc($this->query)) {
      $this->accounts = $this->rows;
    }

    $this->row = mysqli_num_rows($this->query);
  }

  public function initSession() {
    if($this->row == 1) {
      $_SESSION['signedin'] = $this->accounts;

      // header("Location: ".$_SERVER['REQUEST_URI']);
      header("Location: http://".$_SERVER['SERVER_NAME'].$this->project.$this->home);
    }
  }

  public function rowError() {
    if($this->row == 0) {
      $this->username = "Gebruikersnaam is verkeerd";
      $this->password = "Wachtwoord is verkeerd";
    }
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