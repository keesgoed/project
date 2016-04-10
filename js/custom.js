$(document).ready(function() {
  var pathname = window.location.pathname; // Returns path only
  var paths = pathname.split("/");

  var webpages = paths[2];

  switch (webpages) {
    case "klanten":
      initDTTT(webpages);
      $("<a href='klant_toevoegen' class='btn btn-default edit-btn'>Klant toevoegen</a>").prependTo("div.dataTables_filter");
      break;
    case "offertes":
      initDTTT(webpages);
      $("<a href='offerte_toevoegen' class='btn btn-default edit-btn'>Offerte maken</a>").prependTo("div.dataTables_filter");
      break;
    case "klant_toevoegen":
      initDTTTables(webpages);
      break;
    case "offerte_toevoegen":
      initDTTTables(webpages);
      $("<a href='klant_toevoegen' class='btn btn-default btn-right'>Klant toevoegen</a>").appendTo("div#left-cstmr");
      break;
    case "offerte_bewerken":
      // $(".col-lg-8" ).before( "<div class='container'>" );
      // $(".col-lg-8").appendTo(".container");
      break;
    default:
      initDTTT("klanten");
      $("<a href='klant_toevoegen' class='btn btn-default edit-btn'>Klant toevoegen</a>").prependTo("div.dataTables_filter");
  }

  $('body').on('click', 'td[id]', function() {
    id = $(this).attr('id');
    idString = id.substring(0, 1);
    id = id.substring(1);

    if (idString == 'k') {
      if (id != 0) {
        $.ajax({
          type: "POST",
          url: "incl/customers/customer_form.php",
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
    }
    else if (idString == 'o') {
      if (id != 0) {
        $.ajax({
          type: "POST",
          url: "incl/offers/offer_submit.php",
          data: {
            id: id
          },
          success: function(data) {
            $("#right-acc-btn").replaceWith(data);
          }
        });
      }
      else {
        alert('Selecteer een klant.');
      }
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
  firstname = $("#first-cust").val();
  lastname = $("#last-cust").val();

  email = $("#email-cust").val();
  zipcode = $("#zipcode-cust").val();
  phone = $("#phone-cust").val();
  street = $("#street-cust").val();
  place = $("#place-cust").val();
  country = $("#country-cust").val();
  company = $("#company-cust").val();
  description = $("#description-cust").val();

  if (firstname != '' && lastname != '' && zipcode != '' && street != '') {
    $.ajax({
      type: "POST",
      url: "incl/customers/sql/insert_customer.php",
      data: {
        firstname: firstname,
        lastname: lastname,
        email: email,
        zipcode: zipcode,
        phone: phone,
        street: street,
        place: place,
        country: country,
        company: company,
        description: description
      },
      success: function(data) {
        location.reload();
      }
    });
  }
  else {
    alert('Vul de verplichte velden in.');
  }
}


function updateCustomer(id) {
  firstname = $("#first-cust").val();
  lastname = $("#last-cust").val();

  email = $("#email-cust").val();
  zipcode = $("#zipcode-cust").val();
  phone = $("#phone-cust").val();
  street = $("#street-cust").val();
  place = $("#place-cust").val();
  country = $("#country-cust").val();
  company = $("#company-cust").val();
  description = $("#description-cust").val();

  if (firstname != '' && lastname != '') {
    $.ajax({
      type: "POST",
      url: "incl/customers/sql/update_customer.php",
      data: {
        id: id,
        firstname: firstname,
        lastname: lastname,
        email: email,
        zipcode: zipcode,
        phone: phone,
        street: street,
        place: place,
        country: country,
        company: company,
        description: description
      },
      success: function(data) {
        location.reload();
      }
    });
  }
  else {
    alert('Vul alle velden in.');
  }
}

function insertOffer(id) {
  description = $("#description-offer").val();
  price = $("#price-offer").val();

  if (description != '' && price != '') {
    $.ajax({
      type: "POST",
      url: "incl/offers/sql/insert_offer.php",
      data: {
        id: id,
        price: price,
        description: description
      },
      success: function(data) {
        location.reload();
      }
    });
  }
  else {
    alert('Vul alle velden in.');
  }
}

function updateOffer(id_get) {
  description = $("#description-offer").val();
  price = $("#price-offer").val();

  if (description != '' && price != '') {
    $.ajax({
      type: "POST",
      url: "incl/offers/sql/update_offer.php",
      data: {
        id : id_get,
        price: price,
        description: description
      },
      success: function (data) {
        window.location.replace("offertes");
      }
    });
  }
  else {
    alert('Vul alle velden in.');
  }
}

function errorOffer() {
  alert("Selecteer een klant.");
}

function deleteOffer(id_get) {
  $.ajax({
    type: "POST",
    url: "incl/offers/sql/delete_offer.php",
    data: {
      id: id_get,
    },
    success: function (data) {
      window.location.replace("offertes");
      alert(data);
    }
  });
}
  

function errorOffer() {
  alert("Selecteer een klant.");
}