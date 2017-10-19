<script>
	var table = $('#datatable1').DataTable({
		"dom": 'lCfrtip',
		"order": [],
		"colVis": {
			"buttonText": "Columns",
			"overlayFade": 0,
			"align": "right"
		},
		"sDom": '<"top"l>t<"bottom"ip><"clear">',
		"language": {
			"lengthMenu": '_MENU_ entries per page',
			"paginate": {
				"previous": '<i class="fa fa-angle-left"></i>',
				"next": '<i class="fa fa-angle-right"></i>'
			}
		}
	});

	$('#datatable1 tbody').on('click', 'tr', function() {
		$(this).toggleClass('selected');
		if ($(this).hasClass('selected')) {
			$(this).children('input').prop('disabled', false);
		} else {
			$(this).children('input').prop('disabled', true);
		}	
	});

	$('search').on('click', function () {
		table.search( $('#searchMhs').val() ).draw();
	});

	$(document).keypress(function(e) {
	    if(e.which == 13) {
	        table.search( $('#searchMhs').val() ).draw();
	    }
	});
	
</script>