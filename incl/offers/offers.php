<?php

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
      SELECT o.offers_id, o.customers_id, o.offers_subtotal_price, o.offers_description, o.offers_date, 
             c.customers_id, c.firstname, c.lastname, c.company
      FROM offers AS o, customers AS c
      WHERE o.customers_id = c.customers_id
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
  }
  
  public function createRows() {
    while($this->rows = mysqli_fetch_assoc($this->query)) {
      echo("<tr>
              <td>".$this->rows['offers_id']."</td>
              <td>".$this->rows['firstname']." ".$this->rows['lastname']."</td>
              <td>".$this->rows['company']."</td>
              <td>&euro;".$this->rows['offers_subtotal_price']."</td>
              <td>".$this->rows['offers_description']."</td>
              <td>".$this->rows['offers_date']."</td>
              <td><a href='offerte_bewerken?id=".$this->rows['offers_id']."'>Bewerken</a></td>
              <td><a href='incl/offers/templates/template_one.php?offer_id=".$this->rows['offers_id']."&customer_id=".$this->rows['customers_id']."' target='_blank'>Link</a></td>
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
        <th>Klantnaam</th>
        <th>Bedrijf</th>
        <th>Bedrag</th>
        <th>Beschrijving</th>
        <th>Datum</th>
        <th>Bewerken</th>
        <th>Link</th>
      </tr>
    </thead>
    <tbody>
      <?php $offers->createRows(); ?>
    </tbody>
  </table>
</div>