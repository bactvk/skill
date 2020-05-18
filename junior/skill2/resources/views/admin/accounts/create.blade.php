@extends('admin.layouts.app')
@section('title','Create account')
@section('content')
<div class="right_col" role="main">
    <div class="">
		<div class="page-title">
          <div class="title_left">
            <h3>{{trans('app.account')}}</small></h3>
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
              <div class="x_title">
                <h2>Form {{trans('app.create')}} </h2>
                
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
                @include('admin.accounts._form',[
                    'routeName' => route('admin-accounts-create')
                  ])
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