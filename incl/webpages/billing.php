<?php

class Billing extends Database {

    public $errormsg;

    private $firstname;
    private $lastname;
    private $email;
    private $phone;
    private $street;
    private $zipcode;
    private $place;
    private $country;
    private $company;
    private $description;

    //variables to execute the first query (generate table with customers)
    private $query_customers;
    private $result_customers;
    private $qry_insert_customer;
    private $qry_insert_address;

        public function __construct(){
        $this->connDatabase();
        $this->dbError();

        //Execute functions
        $this->getCustomers();
        $this->insertCustomers();

    }
    //Function to insert data into a database
    public function insertCustomers(){

    //Retreive variables if the form is submitted
        if (isset($_POST['submit'])){
            if ($_POST['id'] == 0) {
                $this->firstname = $_POST['firstname'];
                $this->lastname = $_POST['lastname'];
                $this->email = $_POST['email'];
                $this->phone = $_POST['phone'];
                $this->street = $_POST['street'];
                $this->zipcode = $_POST['zipcode'];
                $this->place = $_POST['place'];
                $this->country = $_POST['country'];
                $this->company = $_POST['company'];
                $this->description = $_POST['description'];

                //Add slashes to be able to use ' in the input field
                $this->firstname = addslashes($this->firstname);
                $this->lastname = addslashes($this->lastname);
                $this->company = addslashes($this->company);
                $this->country = addslashes($this->country);
                $this->place = addslashes($this->place);
                $this->street = addslashes($this->street);
                $this->description = addslashes($this->description);

                // Two queries to input the data into the database
                // Query to input into customers table
                $this->qry_insert_customer = "INSERT INTO customers (company, firstname, lastname, email, phone)
                                          VALUES ('$this->company','$this->firstname', '$this->lastname', '$this->email', '$this->phone')";

                // Query to input into customers table
                $this->qry_insert_address = "INSERT INTO addresses (address, city, country, postal_code)
                                         VALUES ('$this->street','$this->place','$this->country','$this->zipcode')";

                //Execute both queries
                mysqli_query($this->db, $this->qry_insert_customer);
                mysqli_query($this->db, $this->qry_insert_address);
            }
        }
    }


    public function getCustomers(){
        //Create query to retreive customers from database
        $this->query_customers = "SELECT customers_id, firstname, lastname
                                  FROM customers
                                  ORDER BY firstname ASC";

        $this->result_customers = mysqli_query($this->db, $this->query_customers);

        //Table with first and lastname of customer ordered by alphabet ascending.
        echo '<div class="container">
                <div class="col-lg-4">
            <table id="table-facturatie" class="table table-striped table-bordered dt-responsive nowrap">
              <thead>
                <tr>
                    <th>Naam</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td id="C0">(Nieuw)</td>
                </tr>';
        while ($this->rows = mysqli_fetch_assoc($this->result_customers)) {
            $this->customers = $this->rows;
            echo "<tr>
                    <td id='C".$this->customers['customers_id']."'>".$this->customers['firstname']." ".$this->customers['lastname']."</td>
                  </tr>
            ";

        }
        echo '</tbody></table></div>';
    }


}

$billing = new Billing();
?>

<div class="col-lg-8">
    <form method="post">
  <?php require_once $globals->customerform_php; ?>
    </form>
</div>
