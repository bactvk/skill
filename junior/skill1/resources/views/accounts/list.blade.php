@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row mt-4 mb-4">
        
            <div class="col-md-7">
                <h2>DO ONE</h2>
            </div>
			<div class="offset-md-3">
				<a class="btn btn-success " href="{{route('account_add')}}"> Create New Product</a>
			</div>
            
            @if(Session::has('msg'))
                <div class="alert alert-success">{{Session::get('msg')}}</div>
            @endif
		
    </div>
   
    
   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th col-name="id" class="table-sort 
                    @if(!empty($inputs['sort']['id']))
                        {{'sorting_'.$inputs['sort']['id']}}
                    @else
                        sorting
                    @endif
                    "
                >No
                    {{-- <i class="fa fa-arrow-up"></i>
                    <i class="fa fa-arrow-down"></i> --}}
                </th>
                <th>Name</th>
                <th>Email</th>
    			<th>Avatar</th>
    			<th>Status</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody id="listAccounts">
            @foreach($lists as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
        			<td>
                        @if(!empty($item->avatar))<img alt="" src="assets/image/avatar/{{$item->avatar}}" width="50" height="50">    @endif      
                    </td>
        			<td>
                        @if($item->status == 1)
                            <span class="bg-success">Active</span>
                        @else
                            <span class="bg-light">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <form action="" method="POST">
           
                            <a class="btn btn-primary" href="{{route('account_edit',$item->id)}}">Edit</a>
           
                            <a class="btn btn-danger delete" data-href="{{route('account_delete',$item->id)}}">Delete</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="float-right">
        {{$lists->links()}}
    </div>

    <div class="text-center">
        <a href="javascript:void(0)" class="btn btn-danger see_more" url="{{route('getListAccounts')}}">See more</a>
    </div>
    <form method="post" action="" id="sortColumn">
       @csrf
    </form>
</div>
@endsection
