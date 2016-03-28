<?php
if(isset($_POST['id'])) {
    require_once "../globals.php";
    require_once $globals->database_php;
}


class OfferForm extends Database {
    public $description = "";
    public $price = "";
    public $date;

    //ID needed for update query
    public $id;
    public $value;

    public function __construct()
    {
        $this->connDatabase();
        $this->dbError();

        $this->insertOffer();
    }
    


//Function to insert data into the database
    public function insertOffer()
    {

        if(isset($_POST['offer_id'])){
            
            if (isset($_POST['submit'])){
                include "queries/insert_offer.php";
            }
        } else{
            if(isset($_POST['submit'])){
                include "queries/update_offer.php";
            }
        }
    }
}

$offer_form = new OfferForm();
?>
<div class="col-lg-2">
<input id="right-acc-btn" class="btn btn-primary offerbtn" onclick="(<?php echo (isset($_POST['id']) ? "insertOffer(".$_POST['id'].")" : "errorOffer()");  ?>)"  value="Opslaan">
</div>
