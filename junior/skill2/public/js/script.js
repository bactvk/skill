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
	});

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

		$(".action").children().hide();

		url = $(this).data('url');

		$.ajax({
		  	url : url,
		  	type:'GET',
			success: function success(data){
				var html = '';
				var status = '';
				var image = '';

				for(var item in data){
					//STATUS
					if(data[item]['status'] == 1)
                      status = "<span class='btn btn-success'>Active</span>";
                    else
                      status = "<span class='btn btn-light'>Inactive</span>";
                   	// AVATAR
                   	if(data[item]['avatar'])
                        image  = "<img src='assets/img/avatar/"+data[item]['avatar']+"' width='50' height='50'>";
                    else image = '';

					html += '<tr>'+
					  '<td>' + (Number(item)+1) + '</td>'+
		              '<td>' + data[item]['name'] + '</td>'+
		              '<td>' + data[item]['email'] + '</td>'+
		              '<td>'+ image + '</td>'+
		              '<td>' + status +'</td>'+
		              '<td>' + '</td>'+
		            '</tr>';
				}

				$("#listRowAccount").html(html);

				window.document.body.innerHTML = $("#table_list_account")[0].outerHTML;
				  window.print();
				  location.reload();
			}

		});
  
	});


})