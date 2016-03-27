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
    public function changeCustomers($id)
    {
        //Retreive variables if the form is submitted
        if (isset($_POST['submit'])) {
            if(isset($_POST['id'])) {
                $this->id = $_POST['id'];
            }else{
                $this->id=0;
            }
            if ($id == 0){
                include "queries/insert.php";
            } else {
                include "queries/update.php";
            }
        }
    }
}

$customer_form = new CustomerForm();
?>


<div class="form form-group right-acc-offer">

    <div class="col-lg-11 forminput">
        <label>Omschrijving kosten</label><br>
        <textarea id="comment description-cust" class="form-control" rows="15" col="20" name="description" value=""></textarea>
    </div>

    <div class="col-lg-1"></div>
    <div class="col-lg-3 forminput">
        <label>Totaalprijs</label><br>
        <input type="text" class="form-control" name="price"  id="price-offer"   placeholder="Totaalprijs" value="">
    </div>
    
    <input class="btn btn-primary"  value="Opslaan">
</div>
