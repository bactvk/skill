@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
		<div class="col-lg-12 mt-4 mb-4">
			<div class="pull-left">
				<h2>Add New Product</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{route('account')}}"> Back</a>
			</div>
		</div>

		@if(!empty($errMsg))

		<div class="alert alert-danger">
			@foreach($errMsg as $err)
				<li>{{$err[0]}}</li>
			@endforeach
		</div>
		@endif
	</div>
   

	@include('accounts._form',[
			'routeName' => 'account_add'

		])
</div>

@endsection