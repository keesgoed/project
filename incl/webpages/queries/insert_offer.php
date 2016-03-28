<?php
require_once "../../globals.php";
require_once $globals->database_php;

class QueryInsertOffer extends Database
{

    public $description = "";
    public $price = "";
    public $date;
    public $id = "";

    public function __construct()
    {
        $this->connDatabase();
        $this->dbError();

        $this->decVar();
        $this->addSlash();
        $this->insertDB();

    }
    public function decVar($id){
        //Declare variables
        $this->description = $_POST['description'];
        $this->price = $_POST['price'];
        $this->date = date("Y-m-d H:i");
        $this->id = $_POST['id'];
    }
    public function addSlash(){
        //Add slashes to be able to use ' in the input field
        $this->description = addslashes($this->description);
        $this->price = str_replace(',', '.', $this->price);

    }
    public function insertDB(){
        // Query to input into offers table
        $this->qry_insert_offer = "INSERT INTO offers (customer_id, offer_date, offer_description, offer_subtotal_price)
                                     VALUES ('$this->id','$this->date','$this->description','$this->price')";

        //Execute query
        mysqli_query($this->db, $this->qry_insert_offer);
    }
}
$query_insert_offer = new QueryInsertOffer();

?>