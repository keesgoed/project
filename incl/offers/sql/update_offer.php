<?php
require_once "../../globals.php";
require_once $globals->database_php;

class QueryUpdateOffer extends Database
{
    private $description = '';
    private $price = '';
    
    public function __construct()
    {
        $this->connDatabase();
        $this->dbError();

        $this->decVar();
        $this->addSlash();
        $this->updateDB();
    }

    public function decVar($id){
        //Declare variables
        $this->description = $_POST['description'];
        $this->price = $_POST['price'];
        $this->date = date("Y-m-d H:i");
        $this->customer_id = $_POST['id'];
        
        //static value needs a fix
        $this->offer_id = 1;
    }

    public function addSlash()
    {
        //Add slashes to be able to use ' in the input field
        $this->description = addslashes($this->description);
        $this->price = str_replace(',', '.', $this->price);
    }

    public function updateDB()
    {
        //Create query to update customer
        $this->query_update_offer = "
        UPDATE offers
        SET offer_date = '".$this->date."',
            offer_description = '".$this->description."',
            offer_subtotal_price = '".$this->price."'
        WHERE offer_id= '".$this->offer_id."' AND customer_id = '".$this->customer_id."'
";
        //Execute query
        mysqli_query($this->db, $this->query_update_offer);
    }
}
$query_update_offer = new QueryUpdateOffer();
?>