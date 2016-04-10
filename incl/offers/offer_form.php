<?php
class OfferForm extends Database{

    private $sql;
    private $query;
    private $offers;

    public $offers_description = "";
    public $subtotal = "";
    public $button;
    public $onclick = "errorOffer();";

    public function __construct(){
        $this->connDatabase();
        $this->dbError();


        if(isset($_GET['id'])){
          $this->getOffer();
        }
    }

    public function getOffer(){
        $this->id = $_GET['id'];

        $this->sql = "
      SELECT customers_id, offers_subtotal_price, offers_description, offers_date
      FROM offers AS o
      WHERE offers_id = '$this->id'
    ";

        $this->query = mysqli_query($this->db, $this->sql);

        while ($this->row = mysqli_fetch_assoc($this->query)) {
            $this->offers = $this->row;
        }

        //Declare fields in input fields
        $this->offers_description = $this->offers['offers_description'];
        $this->subtotal = $this->offers['offers_subtotal_price'];

        //stripslash description
        $this->offers_description = stripslashes($this->offers_description);
    }
    public function getInfo(){
       
    }

}
$offer_form = new OfferForm();
?>
<div class="container">

    <div class="col-lg-8">
        <div class="col-lg-4 customerinfo">
            <label>Bedrijf: PARTICULIER</label><br>
            <label>Naam: Kees Goedegebuure</label>
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

              <div class="col-lg-2">

                  <?php require_once $globals->offersubmit_php; ?>
              </div>
          </div>
          </form>
    </div>
</div>