<!DOCTYPE html>
<html>
<head>
	<title>register</title>
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
            <h4> user register</h4>
            <hr>
        		     <form action="{{url('/create')}}" method="post">
                  {{csrf_field()}}

                    <div class="results">
                  @if(Session::get('success'))
                   <div class="alert alert-success">{{ Session::get('success')}}</div>
                  @endif
                  @if(Session::get('fail'))
                   <div class="alert alert-danger">{{ Session::get('fail')}}</div>
                  @endif
                     </div>
                  <div class="form-group">
                    <label for="">name</label>
                    <input type="text" class="form-control" name="name" placeholder=" enter name">
                    <span class="text-danger">@error ('name')  {{ $message   }} @enderror</span>
                    </div>
        			      <div class="form-group">
        						<label for="">email</label>
        						<input type="text" class="form-control" name="email" placeholder=" enter email">
                    <span class="text-danger">@error ('email')  {{ $message   }} @enderror</span>
        			      </div>
        			      <div class="form-group">
        						<label for="">password</label>
        						<input type="text" class="form-control" name="password" placeholder=" enter password">
                    <span class="text-danger">@error ('password')  {{ $message   }} @enderror</span>
        			      </div>
        			      <div class="form-group">
        			      	<button type="submit" class=" btn btn-block btn-primary" >sign up</button>
        			      </div>
        			      <a href="login">I already have account</a>
        		   	</form>
        		  </div>
        	</div>
        </div>
</body>
</html>