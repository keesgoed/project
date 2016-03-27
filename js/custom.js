$(document).ready(function() {
  var pathname = window.location.pathname; // Returns path only
  var paths = pathname.split("/");

  var webpages = paths[2];

  switch (webpages) {
    case "klanten":
      initDTTT(webpages);
      $("<a href='facturatie' class='btn btn-default edit-btn'>Klant toevoegen</a>").prependTo("div.dataTables_filter");
      break;
    case "offertes":
      initDTTT(webpages);
      $("<a href='offerte-aanmaken' class='btn btn-default edit-btn'>Offerte maken</a>").prependTo("div.dataTables_filter");
      break;
    case "facturatie":
      initDTTTables(webpages);
      break;
      case "offerte-aanmaken":
      initDTTTables(webpages);
      break;
  }

  $('body').on('click', 'td[id]', function() {
    id = $(this).attr('id');
    id = id.substring(1);

    if (id != 0) {
      $.ajax({
        type: "POST",
        url: "incl/webpages/customer_form.php",
        data: {
          id: id
        },
        success: function(data) {
         $(".right-acc").replaceWith(data);
        }
      });
    }
    else {
      $(".right-acc").load(location.href + " .right-acc > *");
    }
  });
});


function initDTTT(webpage) {
  var table = $("#table-" + webpage).DataTable();
  var tt = new $.fn.dataTable.TableTools(table, {
    "sSwfPath": "//cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf",
    "aButtons": ["xls", "pdf", "print"]
  });

  $(tt.fnContainer()).insertBefore("div.dataTables_wrapper");
}

function initDTTTables(webpage) {
  var table = $("#table-" + webpage).DataTable();
  var tt = new $.fn.dataTable.TableTools(table, {
    "aButtons": [],
    "sRowSelect": "single",
    "language": {
      "search": "Zoeken"
    }
  });
}

function insertCustomer() {
  firstname =   $("#first-cust").val();
  lastname =    $("#last-cust").val();

  email =       $("#email-cust").val();
  zipcode =     $("#zipcode-cust").val();
  phone =       $("#phone-cust").val();
  street =      $("#street-cust").val();
  place =       $("#place-cust").val();
  country =     $("#country-cust").val();
  company =     $("#company-cust").val();
  description = $("#description-cust").val();

  if(firstname != '' && lastname != ''){
    $.ajax({
      type: "POST",
      url: "incl/webpages/queries/insert.php",
      data: {
        firstname : firstname,
        lastname : lastname,
        email : email,
        zipcode : zipcode,
        phone : phone,
        street : street,
        place : place,
        country : country,
        company : company,
        description : description
      },
      success: function(data) {
        location.reload();
      }
    });
  }
  else{
    alert('Vul alle velden in.');
  }
}


function updateCustomer(id) {
  firstname =   $("#first-cust").val();
  lastname =    $("#last-cust").val();

  email =       $("#email-cust").val();
  zipcode =     $("#zipcode-cust").val();
  phone =       $("#phone-cust").val();
  street =      $("#street-cust").val();
  place =       $("#place-cust").val();
  country =     $("#country-cust").val();
  company =     $("#company-cust").val();
  description = $("#description-cust").val();

  if(firstname != '' && lastname != ''){
    $.ajax({
      type: "POST",
      url: "incl/webpages/queries/update.php",
      data: {
        id : id,
        firstname : firstname,
        lastname : lastname,
        email : email,
        zipcode : zipcode,
        phone : phone,
        street : street,
        place : place,
        country : country,
        company : company,
        description : description
      },
      success: function(data) {
        location.reload();
      }
    });
  }
  else{
    alert('Vul alle velden in.');
  }
}






