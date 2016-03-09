<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="//cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="css/dataTables.bootstrap.css" rel="stylesheet">
  <!-- CSS -->
  <link href="css/signin.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">

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

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
  <script src="js/dataTables.tableTools.js"></script>
  <script src="js/dataTables.bootstrap.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>
