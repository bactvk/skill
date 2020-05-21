<form action="{{$routeName}}" id="demo-form2" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
	@csrf
  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" > {{trans('app.name')}} <span class="text-danger">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="text" name="name" class="form-control" value="{{$name}}">
    </div>
  </div>
  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">{{trans('app.email')}} <span class="text-danger">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="text"  name="email" class="form-control" value="{{$email}}">
    </div>
  </div>
  <div class="item form-group">
    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">{{trans('app.avatar')}}</label>
    <div class="col-md-6 col-sm-6 ">
      {{-- <button style="position: absolute;width: 100px;z-index: 10"  type="button" onclick="document.getElementById('getFile').click()">bo vao day</button> --}}
      {{-- <label style="position: absolute;left: 20%;top: 8%">chua co file</label>
      <input style="display: none"  id="getFile" type="file" name="avatar"> @if($avatar) {{$avatar}} @endif --}}
      <input type="file" name="avatar"> @if($avatar) {{$avatar}} @endif
    </div>
  </div>
  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align">{{trans('app.status')}}</label>
    <div class="col-md-6 col-sm-6 ">
      <div id="gender" class="btn-group" data-toggle="buttons">
        <label class="btn btn-light RadioStatus {{!$status?"active":""}}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
          <input type="radio" name="status" value="0" class="join-btn" {{!$status?"checked":""}} >  {{trans('app.inactive')}}
        </label>
        <label class="btn btn-light RadioStatus {{$status?"active":""}}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
          <input type="radio" name="status" value="1" class="join-btn" {{$status?"checked":""}} >&nbsp; {{trans('app.active')}} &nbsp;
        </label>
      </div>
    </div>
  </div>
  
  <div class="ln_solid"></div>
  <div class="item form-group ">
    <div class="col-md-6 col-sm-6 offset-md-3">
      <a class="btn btn-primary" href="{{route('admin-accounts-list')}}">{{trans('app.cancel')}}</a>
      <button type="submit" class="btn btn-success">&nbsp; {{trans('app.save')}} &nbsp;</button>
    </div>
  </div>

</form>

