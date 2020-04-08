
<form action="{{($routeName == 'account_add')?route($routeName):route($routeName,$id)}}" method="POST" enctype= multipart/form-data>
		@csrf
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Name: <span class="text-danger">*</span></strong>
					<input type="text" name="name" class="form-control" placeholder="Name" value="{{$name}}">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Email: <span class="text-danger">*</span></strong>
					<input value="{{$email}}" type="text" name="email" class="form-control" placeholder="email@gmail.com">
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Avatar:</strong><br>
					<input type="file" name="avatar" >
					@if(!empty($avatar)) <img src="{{asset('assets/image/avatar/'.$avatar)}}" width="50" height="50"> @endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Status</strong>
					<select class="form-control" name="status">
						<option value="1" @if($status == 1) selected @endif >active</option>
						<option value="0" @if($status == 0) selected @endif >inactive</option>
					</select>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-xs-6 col-sm-12 col-md-6 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>