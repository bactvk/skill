@extends('admin.layouts.app')
@section('title','New message')
@section('content')
<div class="right_col" role="main">
    <div class="">
		<div class="page-title">
          <div class="title_left">
            <h3>Message</small></h3>
          </div>

	        <div class="title_right">
	            <ol class="breadcrumb float-sm-right">
	                <li class="breadcrumb-item"><a href="">{{trans('app.home')}}</a></li>
	                <li class="breadcrumb-item ">{{trans('app.account')}}</li>
	                <li class="breadcrumb-item active">{{trans('app.list')}}</li>
	            </ol>
	        </div>
        </div>

        <div class="clearfix"></div>

        {{-- content --}}
		<div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="row">
                  <div class="col-md-3">
                    <h5>Sender Name</h5>
                  </div>
                  <div>{{Auth::user()->name}}</div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <h5>Receiver Name</h5>
                </div>
                  <div>{{""}}</div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <h5>Date</h5>
                </div>
                  <div>{{$created_at}}</div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <h5>Subject</h5>
                </div>
                  <div>{{$subject}}</div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <h5>Message</h5>
                </div>
                  <div>{!! $content !!}</div>
              </div>    
              
            </div>
          </div>
	    </div>
	</div>
</div>

@endsection


