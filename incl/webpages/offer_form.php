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
        if (isset($_POST['submit'])){
            include "queries/insert_offer.php";
        }
    }
}

$offer_form = new OfferForm();
?>


<div class="form form-group right-acc-offer">

    <div class="col-lg-11 forminput">
        <label>Omschrijving kosten</label><br>
        <textarea id="description-offer" name="description" class="form-control" rows="15" col="20" ></textarea>
    </div>

    <div class="col-lg-1"></div>
    <div class="col-lg-3 forminput">
        <label>Totaalprijs</label><br>
        <input type="text" class="form-control" name="price"  id="price-offer"   placeholder="Totaalprijs" value="">
    </div>
    
    <input type="submit" class="btn btn-primary" onclick="(<?php echo (isset($_POST['id']) ? "insertOffer(".$_POST['id'].")" : "test");  ?>)"  value="Opslaan">
</div>
