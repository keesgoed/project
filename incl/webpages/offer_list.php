<?php

class OfferList extends Database {

    public $errormsg;


    //variables to execute the first query (generate table with customers)
    private $query_customers;
    private $result_customers;


    public function __construct(){
        $this->connDatabase();
        $this->dbError();

        //Execute functions
        $this->getCustomers();

    }


    public function getCustomers(){
        //Create query to retreive customers from database
        $this->query_customers = "SELECT customers_id, firstname, lastname
                                  FROM customers
                                  ORDER BY firstname ASC";

        $this->result_customers = mysqli_query($this->db, $this->query_customers);

        //Table with first and lastname of customer ordered by alphabet ascending.
        echo '<div class="container">
                <div class="col-lg-4" id="left-acc-offer">
            <table id="table-offerte-aanmaken" class="table table-striped table-bordered dt-responsive nowrap">
              <thead>
                <tr>
                    <th>Naam</th>
                </tr>
              </thead>
              <tbody>';
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

$offer_list = new OfferList();
?>

<div class="col-lg-8">
    <form method="post">
        <?php require_once $globals->offerform_php; ?>
    </form>
</div>
