$(document).ready(function(){
	$('.btn_delete').click(function(e){
		e.preventDefault();

		var url = $(this).attr('href');
		$.confirm({
			boxWidth: '250px',
			useBootstrap: false,
		    title: '',
		    content: '<span style="text-align:center">Do you want to delete this record?</span>',
		    buttons: {
		        confirm:  {
		            text: '&nbsp;&nbsp; Yes &nbsp;&nbsp;',
		            btnClass: 'btn-blue',
		            keys: ['enter', 'shift'],
		            action: function(){
		                window.location.href = url;
		            }
		        },
		        cancel: function () {
		            
		        },
		       
		    }
		});
	});


	$('.table-sort').click(function(){
		
		form = $('#form_sort');
		var colSort = $(this).attr('colName');
		var typeSort = 'asc';

		$('<input />').attr('type','hidden')
					  .attr('name','sort['+ colSort +']')
					  .attr('value',);
	})

})