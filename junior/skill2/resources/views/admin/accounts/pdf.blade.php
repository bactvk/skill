<!DOCTYPE html>
<html>

<head>
	<title>Printf pdf</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

	<style>
		
		body{
			font-family: DejaVu Sans;
		}
		#customers {
		  
		  border-collapse: collapse;
		  width: 100%;
		}

		#customers td, #customers th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}


		#customers th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: orange;
		  color: white;
		}
	</style>
</head>
<body>
	<h3 style="text-align: center;">List accounts</h3>
	<table id="customers">
	  <tr>
	    <th>ID</th>
	    <th>Name</th>
	    <th>Email</th>
	    <th>Status</th>
	  </tr>
	  @foreach($data as $item)
		  @php 
		  	if($item->status == 1) $status="active" ; 
		  	else $status ="inactive";
		  @endphp
	  <tr>
	    <td>{{$item->id}}</td>
	    <td>{{$item->name}}</td>
	    <td>{{$item->email}}</td>
	    <td>{{$status}}</td>
	  </tr>
	  @endforeach
	</table>

</body>
</html>