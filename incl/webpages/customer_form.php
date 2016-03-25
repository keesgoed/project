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
    public $company = "";
    public $description = "";

    //ID needed for update query
    public $id;
    public $value;


    public function __construct()
    {

        $this->connDatabase();
        $this->dbError();

        //$this->changeCustomers();

        if (isset($_POST['id'])) {
            $this->getCustomers();
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

    }
//
//    public function updateCustomer()
//    {
//        if ($this->id >= 0) {
//            if (isset($_POST['submit'])) {
//                $this->firstname = $_POST['firstname'];
//                $this->lastname = $_POST['lastname'];
//                $this->email = $_POST['email'];
//                $this->phone = $_POST['phone'];
//                $this->street = $_POST['street'];
//                $this->zipcode = $_POST['zipcode'];
//                $this->place = $_POST['place'];
//                $this->country = $_POST['country'];
//                $this->company = $_POST['company'];
//                $this->description = $_POST['description'];
//
//                //Add slashes to be able to use ' in the input field
//                $this->firstname = addslashes($this->firstname);
//                $this->lastname = addslashes($this->lastname);
//                $this->company = addslashes($this->company);
//                $this->country = addslashes($this->country);
//                $this->place = addslashes($this->place);
//                $this->street = addslashes($this->street);
//                $this->description = addslashes($this->description);
//
//            }
//
//            //Create query to update customer
//            $this->query_update_customer = "
//        UPDATE customers, addresses
//        SET firstname = '" . $this->firstname . "',
//            lastname = '" . $this->lastname . "'
//            email = '" . $this->email . "'
//            phone = '" . $this->phone . "'
//            company = '" . $this->company . "'
//            address = '" . $this->street . "'
//            city = '" . $this->place . "'
//            country = '" . $this->country . "'
//            postal_code = '" . $this->zipcode . "'
//        WHERE customers_id=" . $_POST['id'] . "
//        ";
//
//            mysqli_query($this->db, $this->query_update_customer);
//        }
//    }

    //Function to retrieve the value of the button
    public function getValue($id) {
        if ($id != 0){
            $this->value = "updateCustomer(".$id.")";
        } else {
            $this->value = "insertCustomer(".$id.")";
        }
        echo $this->value;
    }


//Function to insert data into a database
    public function changeCustomers()
    {
        //Retreive variables if the form is submitted
        if (isset($_POST['submit'])) {
            if(isset($_POST['id'])) {
                $this->id = $_POST['id'];
            }else{
                $this->id=0;
            }
            if ($this->id == 0){
            include "sql/insert.php";
            } else {
            include "sql/update.php";
            }
        }
    }
}

$customer_form = new CustomerForm();
?>


    <div class="form form-group right-acc">
        <!-- Row 1 -->
        <div class="col-lg-3 forminput">
            <label>Voornaam</label><br>
            <input type="text" class="form-control" name="firstname"  placeholder="Voornaam" value="<?php echo $customer_form->firstname; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Achternaam</label><br>
            <input type="text" class="form-control" name="lastname"   placeholder="Achternaam" value="<?php echo $customer_form->lastname; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Emailadres</label><br>
            <input type="text" class="form-control" name="email"      placeholder="Emailadres" value="<?php echo $customer_form->email; ?>">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 1 -->

        <!-- Row 2 -->
        <div class="col-lg-3 forminput">
            <label>Telefoonnummer</label><br>
            <input type="text" class="form-control" name="phone" placeholder="Telefoonnummer" value="<?php echo $customer_form->phone; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Straatnaam & huisnmr</label><br>
            <input type="text" class="form-control" name="street"     placeholder="Straatnaam & huisnummer" value="<?php echo $customer_form->street; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Postcode</label><br>
            <input type="text" class="form-control" name="zipcode"    placeholder="Postcode" value="<?php echo $customer_form->zipcode; ?>">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 2 -->

        <!-- Row 3 -->
        <div class="col-lg-3 forminput">
            <label>Plaats</label><br>
            <input type="text" class="form-control" name="place"      placeholder="Plaats" value="<?php echo $customer_form->place; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Land</label><br>
            <input type="text" class="form-control" name="country"    placeholder="Land" value="<?php echo $customer_form->country; ?>">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Bedrijf</label><br>
            <input type="text" class="form-control" name="company"    placeholder="Bedrijf" value="<?php echo $customer_form->company; ?>">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 3 -->

        <!-- description field -->
        <div class="col-lg-6 forminput">
            <label>Beschrijving</label><br>
            <textarea id="comment" class="form-control" rows="4" col="20" name="description" value=""></textarea>
        </div>
        
        <input class="btn btn-primary save-button" id="submit" type="submit" name="submit" onclick="<?php if(isset($_POST['id'])){ echo $customer_form->getValue($_POST['id']);}?>">
    </div>
