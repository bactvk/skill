<form action="{{$routeName}}" id="demo-form2" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
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
      <input id="" type="file" name="avatar"> @if($avatar) {{$avatar}} @endif
    </div>
  </div>
  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
    <div class="col-md-6 col-sm-6 ">
      <div id="gender" class="btn-group" data-toggle="buttons">
        <label class="btn btn-light RadioStatus {{!$status?"active":""}}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
          <input type="radio" name="status" value="0" class="join-btn" {{!$status?"checked":""}} >  Inactive 
        </label>
        <label class="btn btn-light RadioStatus {{$status?"active":""}}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
          <input type="radio" name="status" value="1" class="join-btn" {{$status?"checked":""}} >&nbsp; Active &nbsp;
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