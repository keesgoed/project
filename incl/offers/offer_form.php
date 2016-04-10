<?php
class OfferForm extends Database{

    private $sql;
    private $query;
    private $offers;
    
    public $firstname = "";
    public $lastname = "";
    public $company = "";
    public $offers_description = "";
    public $subtotal = "";
    public $button;
    public $onclick = "errorOffer();";

    public function __construct(){
      if(isset($_GET['id'])){
        $this->connDatabase();
        $this->dbError();
        $this->getOffer();
      }
    }

    public function getOffer(){
        $this->id = $_GET['id'];

        $this->sql = "
          SELECT o.offers_subtotal_price, o.offers_description, o.offers_date,
                c.firstname, c.lastname, c.company
          FROM offers AS o, customers AS c
          WHERE o.offers_id = ".$this->id."
            AND o.customers_id = c.customers_id  
        ";

        $this->query = mysqli_query($this->db, $this->sql);

        while ($this->row = mysqli_fetch_assoc($this->query)) {
            $this->offers = $this->row;
        }

        //Declare fields in input fields
        $this->offers_description = $this->offers['offers_description'];
        $this->subtotal = $this->offers['offers_subtotal_price'];
        $this->firstname = $this->offers['firstname'];
        $this->lastname = $this->offers['lastname'];
        $this->company = $this->offers['company'];

        //stripslash description
        $this->offers_description = stripslashes($this->offers_description);
    }
}
$offer_form = new OfferForm();
?>
<div class="container">

    <div class="col-lg-8">
        <div class="col-lg-4 customerinfo" <?php echo ($_GET['page'] == "offerte_bewerken" ? "" : "hidden"); ?>>
            <label>Bedrijf: <?php echo $offer_form->company; ?></label><br>
            <label>Naam: <?php echo $offer_form->firstname." ".$offer_form->lastname;?></label>
        </div>
          <form method="post">
              <div class="form form-group right-offer">

                  <div class="col-lg-11 forminput">
                      <label>Omschrijving kosten</label><br>
                      <textarea id="description-offer" name="description" class="form-control" rows="15" col="20" autofocus><?php echo $offer_form->offers_description; ?></textarea>
                  </div>

                  <div class="col-lg-1"></div>
                  <div class="col-lg-3 forminput">
                      <label>Totaalprijs</label><br>
                      <input type="text" class="form-control" name="price"  id="price-offer"   placeholder="Totaalprijs" value="<?php echo $offer_form->subtotal; ?>">
                  </div>

                  <div class="col-lg-4">
                      <?php require_once $globals->offersubmit_php; ?>
                  </div>
                  <div class="col-lg-2">
                  <input id="right-acc-btn" class="btn btn-primary offerbtn" onclick="deleteOffer(<?php echo $offer_form->id; ?>)"  value="Verwijderen">
                  </div>
              </div>
          </form>
    </div>
</div>