$(document).ready(function(){
  var table = $('.table').DataTable();
  var tt = new $.fn.dataTable.TableTools( table );

  $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');

});