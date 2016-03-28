<?php

class OfferForm {

    public function __construct() {
        
    }
}

$offer_form = new OfferForm();
?>

<div class="col-lg-8">
  <form method="post">
  <div class="form form-group right-offer">

      <div class="col-lg-11 forminput">
          <label>Omschrijving kosten</label><br>
          <textarea id="description-offer" name="description" class="form-control" rows="15" col="20" ></textarea>
      </div>

      <div class="col-lg-1"></div>
      <div class="col-lg-3 forminput">
          <label>Totaalprijs</label><br>
          <input type="text" class="form-control" name="price"  id="price-offer"   placeholder="Totaalprijs" value="">
      </div>
      
      <div class="col-lg-2">
        <?php require_once $globals->offersubmit_php; ?>
      </div>
  </div>
  </form>
</div>