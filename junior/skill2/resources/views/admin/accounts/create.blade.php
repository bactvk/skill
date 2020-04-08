@extends('admin.layouts.app')
@section('title','Create account')
@section('content')
<div class="right_col" role="main">
    <div class="">
		<div class="page-title">
          <div class="title_left">
            <h3>Account</small></h3>
          </div>

	        <div class="title_right">
	            <ol class="breadcrumb float-sm-right">
	                <li class="breadcrumb-item"><a href="">Home</a></li>
	                <li class="breadcrumb-item ">Account</li>
	                <li class="breadcrumb-item active">Lists</li>
	            </ol>
	        </div>
        </div>

        <div class="clearfix"></div>

        {{-- content --}}
		<div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Form Create </h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                @if(!empty($ErrMsg))
                	<div class="alert alert-danger">
                		@foreach($ErrMsg as $err)
                			<li>{{$err}}</li>
                		@endforeach
                	</div>
                @endif
                <form id="demo-form2" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                	@csrf
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" > Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" name="name" class="form-control" value="{{$name}}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text"  name="email" class="form-control" value="{{$email}}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Avatar</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input id="" type="file" name="avatar">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                    <div class="col-md-6 col-sm-6 ">
                      <div id="gender" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-light RadioStatus" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="status" value="0" class="join-btn" >  Inactive 
                        </label>
                        <label class="btn btn-light RadioStatus" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="status" value="1" class="join-btn" checked >&nbsp; Active &nbsp;
                        </label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="ln_solid"></div>
                  <div class="item form-group ">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <a class="btn btn-primary" href="{{route('admin-accounts-list')}}">Cancel</a>
                      <button type="submit" class="btn btn-success">&nbsp; Save &nbsp;</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
	    </div>
	</div>
</div>

@endsection

@section('css')
  <style type="text/css">
      .RadioStatus.active{
        background: #26b99a !important;
      }
  </style>
@endsection