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
  }
  
  public function qryDatabase() {
    $this->sql = "
      SELECT c.customers_id, c.company, c.firstname, c.lastname, c.email, c.phone, c.description,
             a.address, a.city, a.country, a.postal_code
      FROM customers AS c, addresses AS a
      WHERE c.customers_id = a.addresses_id
      ORDER BY c.firstname ASC
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
  }
  
  public function createRows() {
    while($this->rows = mysqli_fetch_assoc($this->query)) {
      echo("<tr>
              <td>".$this->rows['customers_id']."</td>
              <td>".$this->rows['company']."</td>
              <td>".$this->rows['firstname']." ".$this->rows['lastname']."</td>
              <td>".$this->rows['email']."</td>
              <td>".$this->rows['phone']."</td>
              <td>".$this->rows['address']."</td>
              <td>".$this->rows['city']."</td>
              <td>".$this->rows['country']."</td>
              <td>".$this->rows['postal_code']."</td>
              <td>".$this->rows['description']."</td>
            </tr>
      ");
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
        <th>Bedrijf</th>
        <th>Naam</th>
        <th>Email</th>
        <th>Telefoon</th>
        <th>Adres</th>
        <th>Plaats</th>
        <th>Land</th>
        <th>Postcode</th>
        <th>Beschrijving</th>
      </tr>
    </thead>
    <tbody>
      <?php $customers->createRows(); ?>
    </tbody>
  </table>
</div>