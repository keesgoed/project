<?php

class OfferSubmit {

    public $onclick = "errorOffer();";

    public function __construct() {
        //Change onclick value to insertOffer()
      if (isset($_POST['id'])) {
        $this->insertOnclick();
      }
        //Change onclick value to updateOffer()
        if(isset($_GET['id'])){
            $this->updateOnclick();
        }
    }
    
    public function insertOnclick() {
        $this->onclick = "insertOffer(" . $_POST['id'] . ");";
    }
    public function updateOnclick(){
        $this->onclick = "updateOffer(".$_GET['id'].");";
    }
}

$offer_submit = new OfferSubmit();
?>

<input id="right-acc-btn" class="btn btn-primary offerbtn" onclick="<?php echo $offer_submit->onclick; ?>"  value="Opslaan">

