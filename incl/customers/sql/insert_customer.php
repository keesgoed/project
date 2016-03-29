<?php
require_once "../../globals.php";
require_once $globals->database_php;

class QueryInsert extends Database
{

    private $firstname = '';
    private $lastname = '';
    private $email = '';
    private $phone = '';
    private $street = '';
    private $zipcode = '';
    private $place = '';
    private $country = '';
    private $company = '';
    private $description = '';

    
    public function __construct()
    {
    $this->connDatabase();
    $this->dbError();  
        
    $this->decVar();
    $this->addSlash();
    $this->insertDB();
        
    }
    public function decVar(){
        //Declare variables
        $this->firstname = $_POST['firstname'];
        $this->lastname = $_POST['lastname'];
        $this->email = $_POST['email'];
        $this->phone = $_POST['phone'];
        $this->street = $_POST['street'];
        $this->zipcode = $_POST['zipcode'];
        $this->place = $_POST['place'];
        $this->country = $_POST['country'];
        $this->company = $_POST['company'];
        $this->description = $_POST['description'];    
    }
    public function addSlash(){
        //Add slashes to be able to use ' in the input field
        $this->firstname = addslashes($this->firstname);
        $this->lastname = addslashes($this->lastname);
        $this->company = addslashes($this->company);
        $this->country = addslashes($this->country);
        $this->place = addslashes($this->place);
        $this->street = addslashes($this->street);
        $this->description = addslashes($this->description);    
    }
    public function insertDB(){
        // Two queries to input the data into the database
        // Query to input into customers table
        $this->qry_insert_customer = "INSERT INTO customers (company, firstname, lastname, email, phone, description)
                                      VALUES ('$this->company','$this->firstname', '$this->lastname', '$this->email', '$this->phone', '$this->description')";

        // Query to input into customers table
        $this->qry_insert_address = "INSERT INTO addresses (address, city, country, postal_code)
                                     VALUES ('$this->street','$this->place','$this->country','$this->zipcode')";

        //Execute both queries
        mysqli_query($this->db, $this->qry_insert_customer);
        mysqli_query($this->db, $this->qry_insert_address); 
    }
}

$query_insert = new QueryInsert();
?>