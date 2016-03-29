<?php
if(isset($_POST['id'])) {
  require_once "../globals.php";
  require_once $globals->database_php;
}


class CustomerForm extends Database {
    public $firstname = "";
    public $lastname = "";
    public $email = "";
    public $phone = "";
    public $street = "";
    public $zipcode = "";
    public $place = "";
    public $country = "";
    public $company = "PARTICULIER";
    public $description = "";
    
    public $value = "Insert";
    public $onclick = "insertCustomer();";

    public function __construct()
    {

        $this->connDatabase();
        $this->dbError();

        //$this->changeCustomers();

        if (isset($_POST['id'])) {
            $this->getCustomers();
            $this->changeInput();
        }
    }

    public function getCustomers()
    {
        //Create query to retreive customers from database
        $this->query_customers = "
      SELECT *
      FROM customers, addresses
      WHERE customers_id = addresses_id
          AND customers_id = " . $_POST['id'] . "
    ";

        $this->result_customers = mysqli_query($this->db, $this->query_customers);

        while ($this->row = mysqli_fetch_assoc($this->result_customers)) {
            $this->customers = $this->row;
        }
        //Declare fields in input fields
        $this->firstname = $this->customers['firstname'];
        $this->lastname = $this->customers['lastname'];
        $this->email = $this->customers['email'];
        $this->phone = $this->customers['phone'];
        $this->street = $this->customers['address'];
        $this->zipcode = $this->customers['postal_code'];
        $this->place = $this->customers['city'];
        $this->country = $this->customers['country'];
        $this->company = $this->customers['company'];
        $this->description = $this->customers['description'];

    }
    
    public function changeInput() {
      $this->value = "Update";
      $this->onclick = "updateCustomer(".$_POST['id'].");";
    }
}

$customer_form = new CustomerForm();
?>

<div class="col-lg-8 right-acc">
    <form method="post">

    <div class="form form-group">
        <!-- Row 1 -->
        <div class="col-lg-3 forminput">
            <label>Voornaam *</label><br>
            <input type="text" class="form-control" name="firstname"  id="first-cust" placeholder="Voornaam" value="<?php echo $customer_form->firstname; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Achternaam *</label><br>
            <input type="text" class="form-control" name="lastname"  id="last-cust"  placeholder="Achternaam" value="<?php echo $customer_form->lastname; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Emailadres</label><br>
            <input type="text" class="form-control" name="email" id="email-cust"     placeholder="Emailadres" value="<?php echo $customer_form->email; ?>">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 1 -->

        <!-- Row 2 -->
        <div class="col-lg-3 forminput">
            <label>Telefoonnummer</label><br>
            <input type="text" class="form-control" name="phone" id="phone-cust" placeholder="Telefoonnummer" value="<?php echo $customer_form->phone; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Straatnaam & huisnmr</label><br>
            <input type="text" class="form-control" name="street" id="street-cust"     placeholder="Straatnaam & huisnummer" value="<?php echo $customer_form->street; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Postcode</label><br>
            <input type="text" class="form-control" name="zipcode"  id="zipcode-cust"   placeholder="Postcode" value="<?php echo $customer_form->zipcode; ?>">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 2 -->

        <!-- Row 3 -->
        <div class="col-lg-3 forminput">
            <label>Plaats</label><br>
            <input type="text" class="form-control" name="place" id="place-cust"     placeholder="Plaats" value="<?php echo $customer_form->place; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Land</label><br>
            <input type="text" class="form-control" name="country" id="country-cust"    placeholder="Land" value="<?php echo $customer_form->country; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Bedrijf</label><br>
            <input type="text" class="form-control" name="company"  id="company-cust"   placeholder="Bedrijf" value="<?php echo $customer_form->company; ?>">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 3 -->

        <!-- description field -->
        <div class="col-lg-6 forminput">
            <label>Beschrijving</label><br>
            <textarea id="description-cust" class="form-control" rows="4" col="20" name="description"><?php echo $customer_form->description; ?></textarea>
        </div>
        
        <input class="btn btn-primary save-button"  value="<?php echo $customer_form->value; ?>" onclick="<?php echo $customer_form->onclick; ?>">
    </div>
</form>
</div>