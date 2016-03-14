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
        console.log(webpages);
        break; 
  }
});

<<<<<<< HEAD
  $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');

});
=======
function initDTTT(webpage) {
  var table = $("#table-" + webpage).DataTable();
  var tt = new $.fn.dataTable.TableTools(table, {
    "sSwfPath": "//cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf",
    "aButtons": ["xls", "pdf", "print"]
  });
  
  $(tt.fnContainer()).insertBefore("div.dataTables_wrapper");
}
>>>>>>> e41b0a537e252887db7a928bbd1cc194b30caf08
