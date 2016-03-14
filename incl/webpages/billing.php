<?php
class Billing extends Database{

    private $customername;
    private $description;
    private $subtotal;

    //variables to execute the first query (generate table with customers)
    private $query_customers;
    private $result_customers;

    public function __construct(){
        $this->connDatabase();
        $this->dbError();

        $this->getCustomers();

}
    public function getCustomers(){

        $this->query_customers = "SELECT firstname, lastname
                                  FROM customers
                                  ORDER BY firstname ASC";

        $this->result_customers = mysqli_query($this->db, $this->query_customers);

        //table with first and lastname of customer ordered by alphabet ascending.
        echo '<div class="container">
                <div class="col-lg-4">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                    <th>Naam</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>(Nieuw)</td>
                </tr>';
            while ($this->rows = mysqli_fetch_assoc($this->result_customers)) {
                $this->customers = $this->rows;
            echo '
                <tr>
                    <td>
                       '.$this->customers["firstname"].' '.$this->customers["lastname"].'<br>
                    </td>
                </tr>
             </tbody>';
        }
            echo '</table></div>';
    }


}
$billing = new Billing();
?>
<form method="post">
        <div class="col-lg-2 form-group">
            <label>Voornaam</label><br>
            <input type="text" class="form-control" name="firstname"  placeholder="Voornaam">
        </div>
            <div class="col-lg-1"></div>
        <div class="col-lg-2 form-group">
            <label>Achternaam</label><br>
            <input type="text" class="form-control" name="lastname"   placeholder="Achternaam">
        </div>
             <div class="col-lg-1"></div>
        <div class="col-lg-2 form-group">
            <label>Emailadres</label><br>
            <input type="text" class="form-control" name="email"      placeholder="Emailadres">
        </div>
        <div class="col-lg-2 form-group">
            <label>Telefoonnummer</label><br>
            <input type="text" class="form-control" name="phone" placeholder="Telefoonnummer">
        </div>
            <div class="col-lg-1"></div>
        <div class="col-lg-2 form-group">
            <label>Straatnaam & nummer</label><br>
            <input type="text" class="form-control" name="street"     placeholder="Straatnaam & huisnummer">
        </div>
             <div class="col-lg-1"></div>
        <div class="col-lg-2 form-group">
            <label>Postcode</label><br>
            <input type="text" class="form-control" name="zipcode"    placeholder="Postcode">
        </div>
    <div class="row">
        <div class="col-lg-2 form-group">
            <label>Plaats</label><br>
            <input type="text" class="form-control" name="place"      placeholder="Plaats">
        </div>
            <div class="col-lg-1"></div>
        <div class="col-lg-2 form-group">
            <label>Land</label><br>
            <input type="text" class="form-control" name="country"    placeholder="Land">
        </div>
            <div class="col-lg-1"></div>
        <div class="col-lg-2 form-group">
            <label>Bedrijf</label><br>
            <input type="text" class="form-control" name="company"    placeholder="Bedrijf">
        </div>
    </div>
    <label>Beschrijving</label><br>
    <input type="textarea">
    <input type="submit" name="submit">


</form>
</div>
