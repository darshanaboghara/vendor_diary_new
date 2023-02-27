$( document ).ready(function() {
	$(".export").click(function() {
		var export_type = $(this).data('export-type');		
		$('#example').tableExport({
			type : export_type,			
			escape : 'false',
			ignoreColumn: []
		});		
	});
});
