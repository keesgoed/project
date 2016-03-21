$(document).ready(function(){
  var pathname = window.location.pathname; // Returns path only
  var paths = pathname.split("/");
  var webpages = paths[2].substring(0, 20);

  switch(webpages) {
    case "klanten":
        initDTTT(webpages);
        break;
    case "offertes":
        console.log(webpages);
        break;
    case "facturatie":
        initDTTTables(webpages);
        break; 
  }
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

  $(tt.fnContainer()).insertBefore("div.dataTables_wrapper");
}

$(document).ready(function(){
    $('body').on('click','td[id]', function(){
       id = $(this).attr('id');
       id = id.substring(1);
        console.log(id);
        if (id != 0){
            $.ajax({
                type: "POST",
                url: "incl/webpages/customer_form.php",
                data: {
                    id : id
                },
                success: function(data){
                    AccIntv = setInterval($(".right-acc").replaceWith(data), 1000);
                    clearInterval(AccIntv);
                    console.log(id);
                }
            });
        }
        else{
            $(".right-acc").load(location.href + " .right-acc > *");
        }
    });
});






