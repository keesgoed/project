<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS -->
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

echo $globals->invoices_php;

  if(empty($_SESSION['signedin'])) {
    require_once $globals->signin_php;
  }
  else {
    // Nav
    require_once $globals->header_php;
    
    if(isset($_GET['page'])) {
      // Content
      switch($_GET['page']) {
        case 'customers':
          echo "Klanten pagina";
          break;
        case 'offers':
          echo "Offertes pagina";
          break;
        case 'invoices':
          require_once $globals->invoices_php;
          break;
        case 'billing':
          require_once $globals->billing_php;
          echo "Facturatie pagina";
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
</body>
</html>
