$(document).ready(function(){
  var str = window.location.pathname; // Returns path only
  var webpages = str.substring(14, 28);
  
  switch(webpages) {
    case "klanten":
        initDTTT();
        break;
    case "offertes":
        console.log(webpages);
        break;
    case "facturatie":
        console.log(webpages);
        break; 
  }
});

function initDTTT() {
  var table = $('.table').DataTable();
  var tt = new $.fn.dataTable.TableTools(table, {
    "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf",
    "aButtons": ["xls", "pdf", "print"]
  });
  
  $(tt.fnContainer()).insertBefore('div.dataTables_wrapper');
}