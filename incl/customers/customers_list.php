<?php

class CustomersList extends Database {

    public $errormsg;
    private $id;

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
        $this->idString();
        $this->getCustomers();

    }
    
    public function idString() {
      $this->id = substr($_GET['page'], 0, 1);
    }


    public function getCustomers(){
        //Create query to retreive customers from database
        $this->query_customers = "SELECT customers_id, firstname, lastname
                                  FROM customers
                                  ORDER BY firstname ASC";

        $this->result_customers = mysqli_query($this->db, $this->query_customers);

        //Table with first and lastname of customer ordered by alphabet ascending.
        echo '<div class="container">
                <div class="col-lg-4" id="left-cstmr">
            <table id="table-'.$_GET['page'].'" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                    <th>Naam</th>
                </tr>
              </thead>
              <tbody>';
        if ($this->id == 'k') {
          echo "<tr>
                  <td id='".$this->id."0'>(Nieuw)</td>
                </tr>
          ";
        }
        while ($this->rows = mysqli_fetch_assoc($this->result_customers)) {
            $this->customers = $this->rows;
            echo "<tr>
                    <td id='".$this->id.$this->customers['customers_id']."'>".$this->customers['firstname']." ".$this->customers['lastname']."</td>
                  </tr>
            ";

        }
        echo '</tbody></table></div>';
    }


}

$customers_list = new CustomersList();
?>
