<?php

class Offers extends Database {
  
  public function __construct() {
    
  }
}

$offers = new Offers();
?>

<div class="container">
  <table id="table-offertes" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Klantnummer</th>
        <th>Offertenummer</th>
        <th>Bedrijf</th>
        <th>Bedrag</th>
        <th>Datum</th>
        
      </tr>
    </thead>
    <tbody>
      <?php  ?>
    </tbody>
  </table>
</div>