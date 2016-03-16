<?php

class Customers extends Database {
  private $sql;
  private $query;
  private $rows;
  private $customers;
  private $row;
  
  public function __construct() {
    $this->connDatabase();
    $this->dbError();
    $this->qryDatabase();
    $this->createRow();
  }
  
  public function qryDatabase() {
    $this->sql = "
      SELECT c.customers_id, c.company, c.firstname, c.lastname, c.email, c.phone, 
             a.address, a.district, a.city, a.country, a.postal_code
      FROM customers AS c, addresses AS a
      WHERE c.customers_id = a.addresses_id
      ORDER BY c.firstname ASC
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    while($this->rows = mysqli_fetch_assoc($this->query)) {
      $this->customers = $this->rows;
    }
    
    $this->row = mysqli_num_rows($this->query);
  }
  
  public function createRow() {
    print_r($this->row);
    while($this->row) {
      
    }
  }
}

$customers = new Customers();
?>

<div class="container">
  <table id="table-klanten" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Klantnummer</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Email</th>
        <th>Telefoon</th>
        <th>Adres</th>
        <th>Regio</th>
        <th>Plaats</th>
        <th>Land</th>
        <th>Postcode</th>
      </tr>
    </thead>
    <tbody>
      <!--<tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>John</td>
      </tr>-->
    </tbody>
  </table>
</div>