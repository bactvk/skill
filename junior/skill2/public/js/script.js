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

		if($(this).hasClass('sorting_asc') || $(this).hasClass('sorting') ){
			typeSort = 'desc';
		}else if($(this).hasClass('sorting_desc')){
			typeSort = 'asc';
		}
		$('<input />').attr('type','hidden')
					  .attr('name','sort['+ colSort +']')
					  .attr('value',typeSort)
					  .appendTo(form);

		form.submit();
	})

	$('#switch_language').change(function(){
		var locale = $(this).val();
		var _token = $("input[name=_token]").val();
		$.ajax({
			url : '/language',
			type : 'POST',
			data:{ locale :locale , _token : _token },
			datatype : 'json',
			success : function(data){
				console.log('ok');
			},
			complete : function(data){
				window.location.reload(true);
			}
		})
	})
	//print
	$('#print_listAccount').click(function(e){
		e.preventDefault();

	    // printContent("table_list_account");
	    // display the hidden table rows
		  var style = "<style>.table_list_account {display: table-row !important; } .pagebreak { display: block; page-break-after: always; }</style>";

		  window.document.body.innerHTML = style + $("#table_list_account")[0].outerHTML;
		  window.print();
		  location.reload();
	})

	//print a div
	function printContent(el){
		var style = "<style>.el {display: table-row !important; }</style>";

	    var restorepage  = $('body').html();
	    var printcontent = $('#' + el).clone();
	    $('body').empty().html(printcontent);
	    window.print();
	    window.close();
	    $('body').html(restorepage);
	    location.reload();
	}

})