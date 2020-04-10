<!DOCTYPE html>
<html>
<head>
	<title>Printf pdf</title>
	<style>
		#customers {
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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
		  background-color: #4CAF50;
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