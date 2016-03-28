<?php
require_once $globals->fpdf_php;

class Offers extends Database {
  private $sql;
  private $query;
  private $rows;
  
  public function __construct() {
    $this->connDatabase();
    $this->dbError();
    $this->qryDatabase();
  }
  
  public function qryDatabase() {
    $this->sql = "
      SELECT o.offers_id, o.customers_id, o.offers_total_price, o.offers_date, 
             c.company 
      FROM offers AS o, customers AS c
      WHERE o.customers_id = c.customers_id
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
  }
  
  public function createRows() {
    while($this->rows = mysqli_fetch_assoc($this->query)) {
      echo("<tr>
              <td>".$this->rows['offers_id']."</td>
              <td>".$this->rows['customers_id']."</td>
              <td>".$this->rows['company']."</td>
              <td>".$this->rows['offers_total_price']."</td>
              <td>".$this->rows['offers_date']."</td>
              <td>Link</td>
            </tr>
      ");
    }
  }
}

$offers = new Offers();
?>

<div class="container">
  <table id="table-offertes" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Offertenummer</th>
        <th>Klantnummer</th>
        <th>Bedrijf</th>
        <th>Bedrag</th>
        <th>Datum</th>
        <th>Link</th>
      </tr>
    </thead>
    <tbody>
      <?php $offers->createRows(); ?>
    </tbody>
  </table>
</div>