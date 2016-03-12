<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CDN Bootstrap/Datatables -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/t/bs/dt-1.10.11,r-2.0.2/datatables.min.css"/>
  <!-- Local TableTools -->
  <link rel="stylesheet" href="css/dataTables.bootstrap.css"/>
  <!-- Custom CSS -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/signin.css" rel="stylesheet">

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
        case 'facturatie':
          require_once $globals->billing_php;
          break;
      }
    }
    
    // Footer
    require_once $globals->footer_php;
  }
?>  

  <!-- CDN JQuery/Bootstrap/Datatables -->
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/t/bs/dt-1.10.11,r-2.0.2/datatables.min.js"></script>
  <!-- Local TableTools -->
  <script src="js/dataTables.tableTools.js"></script>
  <script src="js/dataTables.bootstrap.js"></script>
  <!-- Custom JS -->
  <script src="js/custom.js"></script>
</body>
</html>
