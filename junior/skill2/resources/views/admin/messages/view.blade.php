@extends('admin.layouts.app')
@section('title','New message')
@section('content')
<div class="right_col" role="main">
    <div class="">
		<div class="page-title">
          <div class="title_left">
            <h3>{{trans('app.message')}}</h3>
          </div>

	        <div class="title_right">
	            <ol class="breadcrumb float-sm-right">
	                <li class="breadcrumb-item"><a href="">{{trans('app.message')}}</a></li>
	                <li class="breadcrumb-item">{{trans('app.inbox')}}</li>
	                <li class="breadcrumb-item active">{{trans('app.view')}}</li>
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
                    <h5>{{trans('app.sender_name')}}</h5>
                  </div>
                  <div>{{$sender}}</div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <h5>{{trans('app.receiver_name')}}</h5>
                </div>
                  <div>{{$receiver_name->name}}</div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <h5>{{trans('app.date')}}</h5>
                </div>
                  <div>{{$created_at}}</div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <h5>{{trans('app.subject')}}</h5>
                </div>
                  <div>{{$subject}}</div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <h5>{{trans('app.message')}}</h5>
                </div>
                  <div class="content">{!! $content !!}</div>
              </div>    
              
            </div>
          </div>
	    </div>
	</div>
</div>

@endsection

@section('css')
  <style type="text/css">
    .content img{
      max-width: 100% !important;
      height: auto !important;
    }
  </style>
@endsection


