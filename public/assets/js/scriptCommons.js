$(document).ready( function () {
	var table = 
    $('#table-domain').DataTable({
  		"autoWidth": false,
  		"fixedHeader": true,
  		"responsive":true,
  		"pageLength": 50,
      "responsive": true,
  		"language": 
  		{ search: "" },
  		"columns": [
        { name: 'id-domain' },
        { name: 'domain' },
        { name:'tag' },
        { name: 'graduate' },
        { name: 'certif' },
        { name: 'details' }]
	});
	$('.dataTables_filter input').addClass('search-input full');
	$('.dataTables_filter input').attr('placeholder','Search');
	
	$(".option-col").on( 'click', function (e) {
        e.preventDefault();
        var choiceCol = $(this).attr('value');
        var column = table.column($(this).attr("value")+':name');
        column.visible( ! column.visible() );
    } );
		
	});