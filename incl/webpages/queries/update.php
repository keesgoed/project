<?php

//Declare variables
$this->firstname =   $_POST['firstname'];
$this->lastname =    $_POST['lastname'];
$this->email =       $_POST['email'];
$this->phone =       $_POST['phone'];
$this->street =      $_POST['street'];
$this->zipcode =     $_POST['zipcode'];
$this->place =       $_POST['place'];
$this->country =     $_POST['country'];
$this->company =     $_POST['company'];
$this->description = $_POST['description'];

//Add slashes to be able to use ' in the input field
$this->firstname =   addslashes($this->firstname);
$this->lastname =    addslashes($this->lastname);
$this->company =     addslashes($this->company);
$this->country =     addslashes($this->country);
$this->place =       addslashes($this->place);
$this->street =      addslashes($this->street);
$this->description = addslashes($this->description);

//Create query to update customer
$this->query_update_customer = "
UPDATE customers, addresses
SET firstname = '" . $this->firstname . "',
lastname = '" . $this->lastname . "'
email = '" . $this->email . "'
phone = '" . $this->phone . "'
company = '" . $this->company . "'
address = '" . $this->street . "'
city = '" . $this->place . "'
country = '" . $this->country . "'
postal_code = '" . $this->zipcode . "'
WHERE customers_id=" . $_POST['id'] . "
";

mysqli_query($this->db, $this->query_update_customer);
?>