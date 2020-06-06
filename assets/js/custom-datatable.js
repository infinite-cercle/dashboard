$(function(){
  'use strict';
  if($('#existing-client-table').length){
	$('#existing-client-table').DataTable({
		responsive: true,
	  	language: {
	    	searchPlaceholder: 'Search...',
		    sSearch: '',
		    lengthMenu: '_MENU_ items/page',
	  	},
	  	ordering: false
	});
  }
});