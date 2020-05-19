@extends('admin.layouts.app')
@section('title','New message')
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
                <h2>New </h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                {{-- @if(!empty($ErrMsg))
                	<div class="alert alert-danger">
                		@foreach($ErrMsg as $err)
                			<li>{{$err}}</li>
                		@endforeach
                	</div>
                @endif --}}
                  <form action="" id="demo-form2" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" > Receiver Name <span class="text-danger">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        {{-- <input type="text" name="receiver" class="form-control" value=""> --}}
                        <select name="receiver" class="form-control account_select"> 
                          <option></option>
                          @foreach($listAccount as $account)
                            <option value="{{$account->id}}">{{$account->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Subject <span class="text-danger">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text"  name="subject" class="form-control" value="">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Message</label>
                      <div class="col-md-6 col-sm-6 ">
                        <textarea rows="6" class="form-control" id="summary-ckeditor" name="message_content">
                          
                        </textarea>
                      </div>
                    </div>
                   
                    <div class="ln_solid"></div>
                    <div class="item form-group ">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <a class="btn btn-primary" href="{{route('admin-accounts-list')}}">{{trans('app.cancel')}}</a>
                        <button type="submit" class="btn btn-success">&nbsp; Send &nbsp;</button>
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

@section('script')
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script>

      CKEDITOR.replace( 'summary-ckeditor',{
        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
      } );

      $('.account_select').select2();
  </script>

@endsection

@section('css')
  <style type="text/css">
    .select2-container--default .select2-selection--single{
      border-radius: 0px;
      border: 1px solid #ced4da;
    }
  </style>
@endsection