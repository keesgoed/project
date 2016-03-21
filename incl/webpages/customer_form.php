<?php
if(isset($_POST['id'])) {
  require_once "../globals.php";
  require_once $globals->database_php;
}

class CustomerForm extends Database {
  public $firstname = "";
  public $lastname;
  public $email;
  public $phone;
  public $street;
  public $zipcode;
  public $place;
  public $country;
  public $company;
  public $description;

  public function __construct() {
    if(isset($_POST['id'])) {
      $this->connDatabase();
      $this->dbError();
      
      $this->getCustomers();
    }
  }

  public function getCustomers() {
    //Create query to retreive customers from database
    $this->query_customers ="
      SELECT *
      FROM customers, addresses
      WHERE customers_id = addresses_id
          AND customers_id = ".$_POST['id']." 
    ";

    $this->result_customers = mysqli_query($this->db, $this->query_customers);

    while ($this->row = mysqli_fetch_assoc($this->result_customers)){
      $this->customers = $this->row;
    }

    $this->firstname = $this->customers['firstname'];
    $this->lastname;
    $this->email;
    $this->phone;
    $this->street;
    $this->zipcode;
    $this->place;
    $this->country;
    $this->company;

  }
}

$customer_form = new CustomerForm();
?>

<form method="post">
    <div class="form form-group right-acc">
        <!-- Row 1 -->
        <div class="col-lg-3 forminput">
            <label>Voornaam</label><br>
            <input type="text" class="form-control" name="firstname"  placeholder="Voornaam" value="<?php echo $customer_form->firstname; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Achternaam</label><br>
            <input type="text" class="form-control" name="lastname"   placeholder="Achternaam" value="">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Emailadres</label><br>
            <input type="text" class="form-control" name="email"      placeholder="Emailadres" value="">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 1 -->

        <!-- Row 2 -->
        <div class="col-lg-3 forminput">
            <label>Telefoonnummer</label><br>
            <input type="text" class="form-control" name="phone" placeholder="Telefoonnummer" value="">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Straatnaam & nummer</label><br>
            <input type="text" class="form-control" name="street"     placeholder="Straatnaam & huisnummer" value="">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Postcode</label><br>
            <input type="text" class="form-control" name="zipcode"    placeholder="Postcode" value="">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 2 -->

        <!-- Row 3 -->
        <div class="col-lg-3 forminput">
            <label>Plaats</label><br>
            <input type="text" class="form-control" name="place"      placeholder="Plaats" value="">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Land</label><br>
            <input type="text" class="form-control" name="country"    placeholder="Land" value="">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Bedrijf</label><br>
            <input type="text" class="form-control" name="company"    placeholder="Bedrijf" value="">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 3 -->

        <!-- description field -->
        <div class="col-lg-6 forminput">
            <label>Beschrijving</label><br>
            <textarea id="comment" class="form-control" rows="4" col="20" name="description" value=""></textarea>
        </div>
        
        <input class="btn btn-primary save-button" type="submit" name="submit">
    </div>
</form>