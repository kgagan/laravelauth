<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>  
	    <div class="container">
	    	<div  class="row m-5">
	    		<div  class="col-4 offset-4">
	    			<h4> profile</h4>
	    			<table class="table table hover">
	    				<thead>
	    					<th>name</th>
	    					<th>email</th>

	    				</thead>
	    				<tbody>
	    					<tr>
	    						<td>{{$loggeduserinfo->name  }}</td>
	    						<td>{{$loggeduserinfo->email  }}</td>
	    						<td><a href="logout">logout</a></td>
	    					</tr>
	    				</tbody>
	    			</table>
	    		</div>
	    	</div>
	    </div>