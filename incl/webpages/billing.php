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
            <table id="table-facturatie" class="table table-striped table-bordered dt-responsive nowrap">
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
                </tr>';
        }
        echo '</tbody></table></div>';
    }


}
$billing = new Billing();
?>
<div class="col-lg-8">
<form method="post">
    <div class="form form-group">
        <!-- Row 1 -->
        <div class="col-lg-3 forminput">
            <label>Voornaam</label><br>
            <input type="text" class="form-control" name="firstname"  placeholder="Voornaam">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Achternaam</label><br>
            <input type="text" class="form-control" name="lastname"   placeholder="Achternaam">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Emailadres</label><br>
            <input type="text" class="form-control" name="email"      placeholder="Emailadres">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 1 -->

        <!-- Row 2 -->
        <div class="col-lg-3 forminput">
            <label>Telefoonnummer</label><br>
            <input type="text" class="form-control" name="phone" placeholder="Telefoonnummer">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Straatnaam & nummer</label><br>
            <input type="text" class="form-control" name="street"     placeholder="Straatnaam & huisnummer">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Postcode</label><br>
            <input type="text" class="form-control" name="zipcode"    placeholder="Postcode">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 2 -->

        <!-- Row 3 -->
        <div class="col-lg-3 forminput">
            <label>Plaats</label><br>
            <input type="text" class="form-control" name="place"      placeholder="Plaats">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Land</label><br>
            <input type="text" class="form-control" name="country"    placeholder="Land">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3 forminput">
            <label>Bedrijf</label><br>
            <input type="text" class="form-control" name="company"    placeholder="Bedrijf">
        </div>
        <div class="col-lg-1"></div>
        <!-- End row 3 -->

        <!-- description field -->
        <div class="col-lg-6">
            <label>Beschrijving</label><br>
            <textarea id="comment" class="form-control" rows="4" col="20" name="description"></textarea>
            </div>
    </div>


    <input class="btn btn-primary save-button" type="submit" name="submit">
        </form>
    </div>
</div>

</form>
</div>
