<?php

class OfferSubmit {
    public $onclick = "errorOffer();";

    public function __construct() {
      if (isset($_POST['id'])) {
        $this->changeInput(); 
      }
    }
    
    public function changeInput() {
      $this->onclick = "insertOffer(".$_POST['id'].");";
    }
}

$offer_submit = new OfferSubmit();
?>

<input id="right-acc-btn" class="btn btn-primary offerbtn" onclick="<?php echo $offer_submit->onclick; ?>"  value="Opslaan">

