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
        
        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>{{trans('app.list')}}</h2>
              
              <ul class="nav navbar-right panel_toolbox">
                <div class="">
                  <a href="{{route('admin-messages-create')}}" class="btn btn-success">{{trans('app.create')}} <i class="fa fa-plus"></i> </a>
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
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="table_list_account" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Receiver Name</th>
                              <th>Subject</th>
                              <th>Message</th>
                              <th>Date</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>


                          <tbody id="listRowAccount">
                            @foreach($lists as $key => $item)
                            <tr>
                              <td>{{ $lists->firstItem() + $key }}</td>

                              <td>{{  $item->getAccount()->name  }}</td>

                              <td>{{$item->subject}}</td>
                              <td>
                                {{ strip_tags($item->content) }}
                              </td>
                              <td>
                                {{ $item->created_at }}
                              </td>
                              <td>
                                @if($item->status == 1)
                                  <span class="btn btn-success">Seen</span>
                                @else
                                  <span class="btn btn-light">not seen</span>
                                @endif
                              </td>
                              <td class ="action">  
                                  <a href="{{route('admin-accounts-edit',$item->id)}}" class="btn btn-primary">{{trans('app.edit')}}</a>
                                  <a href="{{route('admin-accounts-delete',$item->id)}}" class="btn btn-danger btn_delete">{{trans('app.delete')}}</a>
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

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
       $('.messageSuccess').slideUp(4000);
    })
  </script>
@endsection