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
        <th>Bedrijf</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
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
      <?php  ?>
    </tbody>
  </table>
</div>