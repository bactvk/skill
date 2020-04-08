@extends('admin.layouts.app')
@section('title','List accounts')
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
        <div>
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>List <small>Accounts</small></h2>
              
              <ul class="nav navbar-right panel_toolbox">
                <div class="">
                  <a href="{{route('admin-accounts-create')}}" class="btn btn-success">Create <i class="fa fa-plus"></i> </a>
                </div>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                  <p class="col-md-1"> <a href="">CSV </a> </p>
                  <p class="col-md-1"> <a href="">PDF </a> </p>
                  <p class="col-md-1"> <a href="">PRINT </a> </p>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Avatar</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>


                          <tbody>
                            @foreach($lists as $item)
                            <tr>
                              <td>{{$item->name}}</td>
                              <td>{{$item->email}}</td>
                              <td>
                                @if($item->avatar)
                                <img src="assets/img/avatar/{{$item->avatar}}" width="50" height="50">
                                @endif
                
                              </td>
                              <td>
                                @if($item->status == 1)
                                  <span class="btn btn-success">Active</span>
                                @else
                                  <span class="btn btn-light">Inactive</span>
                                @endif
                              </td>
                              <td>
                                  <a href="" class="btn btn-primary">Edit</a>
                                  <a href="" class="btn btn-danger">Delete</a>
                              </td>
                            </tr>
                            @endforeach
                            

                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                <div class="float-right">
                  {{$lists->links()}}
                </div>
            </div>

          </div>

        </div>

      </div>
  </div>   
  @if(Session::has('msg'))
  <div class="messageSuccess">
    <div class="col-md-4 alert alert-success text-center" style="position: fixed;right: 25%; top: 7%;font-size: 18px">
        {{Session::get('msg')}}
    </div>
  </div>
  @endif

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
       $('.messageSuccess').slideUp(3000);
    })
  </script>
@endsection