<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CDN Bootstrap/Datatables_Tabletools -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/t/bs/dt-1.10.11,r-2.0.2/datatables.min.css"/>
  <link rel="stylesheet" href="//cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.min.css"/>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/signin.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<?php
require_once "incl/globals.php";
require_once $globals->database_php;
require_once $globals->sessions_php;

  if(empty($_SESSION['signedin'])) {
    require_once $globals->signin_php;
  }
  else {
    // Nav
    require_once $globals->nav_php;
    
    if(isset($_GET['page'])) {
      // Content
      switch($_GET['page']) {
        case 'klanten':
          require_once $globals->customers_php;
          break;
        case 'offertes':
          require_once $globals->offers_php;
          break;
        case 'klant_toevoegen':
          require_once $globals->customerslist_php;
          require_once $globals->customerform_php;
          break;
        case 'offerte_toevoegen':
          require_once $globals->customerslist_php;
          require_once $globals->offerform_php;
          break;
      }
    }
    
    //  Footer
    //  require_once $globals->footer_php;
  }
?>  

  <!-- CDN JQuery/Bootstrap/Datatables_Tabletools -->
  <script src="//code.jquery.com/jquery-2.2.2.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/t/bs/dt-1.10.11,r-2.0.2/datatables.min.js"></script>
  <script src="//cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
  <!-- Local Datatables_Bootstrap -->
  <script src="js/dataTables.bootstrap.js"></script>
  <!-- Custom JS -->
  <script src="js/custom.js"></script>
</body>
</html>
