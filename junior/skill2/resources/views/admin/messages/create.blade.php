@extends('admin.layouts.app')
@section('title','New message')
@section('content')
<div class="right_col" role="main">
    <div class="">
  		<div class="page-title">
            <div class="title_left">
              <h3>{{trans('app.message')}}</small></h3>
            </div>

  	        <div class="title_right">
  	            <ol class="breadcrumb float-sm-right">
  	                <li class="breadcrumb-item"><a href="">{{trans('app.message')}}</a></li>
  	                <li class="breadcrumb-item active">{{trans('app.new')}}</li>
  	                
  	            </ol>
  	        </div>
      </div>

      <div class="clearfix"></div>

          {{-- content --}}
  		<div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('app.new')}}</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="" id="demo-form2" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" > {{trans('app.receiver_name')}} <span class="text-danger">*</span>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">{{trans('app.subject')}} <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  name="subject" class="form-control" value="{{$subject}}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">{{trans('app.message')}}</label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea rows="6" class="form-control" id="summary-ckeditor" name="message_content">
                            
                          </textarea>
                        </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="item form-group ">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <a class="btn btn-primary" href="{{route('admin-messages-list')}}">{{trans('app.cancel')}}</a>
                          <button type="submit" class="btn btn-success">&nbsp; {{trans('app.send')}} &nbsp;</button>
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
  
  @include('ckfinder::setup') 
  <script>

      CKEDITOR.replace( 'summary-ckeditor',{
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        filebrowserUploadUrl: '{{ route('ckfinder_connector') }}',

      } );

      

      $('.account_select').select2({
        width: '100%'
      });
  </script>

@endsection
