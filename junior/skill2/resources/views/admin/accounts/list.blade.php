@extends('admin.layouts.app')
@section('title','List accounts')
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
        <div>
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="{{trans('app.search_for')}}...">
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
              <h2>{{trans('app.list')}} <small>{{trans('app.account')}}</small></h2>
              
              <ul class="nav navbar-right panel_toolbox">
                <div class="">
                  @can('isAdmin')
                  <a href="{{route('admin-accounts-create')}}" class="btn btn-success">{{trans('app.create')}} <i class="fa fa-plus"></i> </a>
                  @endcan
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
                  <p class="col-md-1"> <a href="{{route('admin-accounts-export')}}">CSV </a> </p>
                  <p class="col-md-1"> <a href="{{route('print-pdf')}}">PDF </a> </p>
                  <p class="col-md-1"> <a href="#" id="print_listAccount" data-url={{route('get-all-account')}}>PRINT </a> </p>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="table_list_account" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th></th>
                              <th class="table-sort
                              @if(!empty($sort['name']))
                                sorting_{{$sort['name']}}
                              @else sorting
                              @endif
                              " colName="name">{{trans('app.name')}}</th>
                              <th>{{trans('app.email')}}</th>
                              <th>{{trans('app.avatar')}}</th>
                              <th>{{trans('app.status')}}</th>
                              <th>{{trans('app.action')}}</th>
                            </tr>
                          </thead>


                          <tbody id="listRowAccount">
                            @foreach($lists as $key => $item)
                            <tr>
                              <td>{{ $lists->firstItem() + $key }}</td>
                              <td>{{$item->name}}</td>
                              <td>{{$item->email}}</td>
                              <td>
                                @if($item->avatar)
                                <img src="assets/img/avatar/{{$item->avatar}}" width="50" height="50">
                                @endif
                
                              </td>
                              <td>
                                @if($item->status == 1)
                                  <span class="btn btn-success">{{trans('app.active')}}</span>
                                @else
                                  <span class="btn btn-light">{{trans('app.inactive')}}</span>
                                @endif
                              </td>
                              <td class ="action"> 
                                  @can('isAdmin')
                                  <a href="{{route('admin-accounts-edit',$item->id)}}" class="btn btn-primary">{{trans('app.edit')}}</a>
                                  <a href="{{route('admin-accounts-delete',$item->id)}}" class="btn btn-danger btn_delete">{{trans('app.delete')}}</a>
                                  @endcan
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
      <form id="form_sort" method="post">
        @csrf
      </form>
  </div>   
  @if(Session::has('msg'))
  <div class="messageSuccess">
    <div class="col-md-4 alert alert-success text-center" style="position: fixed;right: 25%; top: 7%;font-size: 18px">
        {{Session::get('msg')}}
    </div>
  </div>
  @endif

  @if(Session::has('msgError'))
  <div class="messageSuccess">
    <div class="col-md-4 alert alert-danger text-center" style="position: fixed;right: 25%; top: 7%;font-size: 18px">
        {{Session::get('msgError')}}
    </div>
  </div>
  @endif

@endsection

