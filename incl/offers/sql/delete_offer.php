<?php
require_once "../../globals.php";
require_once $globals->database_php;
class DeleteOffer extends Database
{
    private $id;

    public function __construct(){
        $this->connDatabase();
        $this->dbError();

        $this->deleteOffer();
    }

    public function deleteOffer(){
        $this->id = $_POST['id'];

        $this->sql = "
        DELETE FROM offers
        WHERE offers_id =  '$this->id'
    ";

        mysqli_query($this->db, $this->sql);
    }
}

$delete_offer = new DeleteOffer();
?>