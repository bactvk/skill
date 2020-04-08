$(document).ready(function(){
	$("body").on('click', '.delete', function(e){
		e.preventDefault();
		var href = $(this).data('href');
		console.log(href)
		$.confirm({
		    title: '',
		    content: '<span style="text-align:center">Do you want to delete this record?</span>',
		    buttons: {
		       
		        confirm: {
		            text: 'Yes',
		            btnClass: 'btn-blue',
		            keys: ['enter', 'shift'],
		            action: function(){
		                window.location.href= href;
		            }
		        },
		        cancel:{
		            
		        },
		    }
		});

	})

	$(function(){
		page = 1;
		root = location.origin;
		$('.see_more').click(function(){
		// $(document).on('click','.see_more',function(){
			
			var URL = $(this).attr('url');
			page += 1;
			$.ajax({
				url: URL,
				type: 'GET',
				data: {
					page:page
				},
				success:function success(data){
					var html = '';
					for(var item in data){
						if(data[item]['status'] == 1){
							status = "<span class='bg-success'>Active</span>";
						}else{
							status = "<span class='bg-light'>Inactive</span>";
						}

						if(data[item]['avatar']) src = "assets/image/avatar/"+data[item]['avatar'];
						else src = '';
						route_edit = root + "/edit/" + data[item]['id'];
						route_delete = root + "/delete/" + data[item]['id']; 

						action = "<form action='' method='POST'>" +
									"<a class='btn btn-primary mr-1' href='" + route_edit + "'" + " >Edit</a>" +
									"<a class='btn btn-danger delete' data-href='" + route_delete + "'" + " >Delete</a>"+

							   "</form>";
						console.log(action);
						html += 
						'<tr>'+
							'<td>' + data[item]['id'] + '</td>' +
							'<td>' + data[item]['name'] + '</td>' +
							'<td>' + data[item]['email'] + '</td>' +
							'<td>' + "<img alt='' src ='" + src + "'" + " width='50' height='50' " + '</td>' +
							'<td>' + status + '</td>' +
							'<td>' + action + '</td>' +
						'</tr>';

					}
					if(data.length > 0){
						$('#listAccounts').append(html);
					}else{
						$('.see_more').css('display','none');
					}

				}
			});
		});

	})

	
	// sort
	$('.table-sort').click(function(){
		var sortType = 'asc';
		var sortCol = $(this).attr('col-name');
		var form = $('#sortColumn');

		if( $(this).hasClass('sorting') || $(this).hasClass('sorting_asc') ){
			sortType = 'desc';
		}else if($(this).hasClass('sorting_desc')){
			sortType = 'asc';
		}

		$('<input />').attr('type','hidden')
					  .attr('name','sort['+sortCol+']')
					  .attr('value',sortType)
					  .appendTo(form);
		
	    form.submit();
	})
})