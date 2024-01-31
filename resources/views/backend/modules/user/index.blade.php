@extends('backend.layouts.master')
@section('title','Admin')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Admins</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body  table-responsive">

                        <h4 class="card-title">Usre Table</h4>

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>                     
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @php $sl=1 @endphp
                            @foreach($admins as $admin)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td><img src="{{asset($admin->photo)}}" alt="" class="img-fluid" style="width: 50px"></td>
                                <td>{{$admin->name}}</td>                
                                <td>{{$admin->email}}</td>
                                <td>
                                    <div class="d-flex">
                                    <a href="{{route('admin.edit',$admin->id)}}"><button class="btn btn-sm btn-warning"><i class="fa-solid fa-edit "></i></button></a> 
                                    <form method="post" id="{{'form_'.$admin->id}}" action="{{route('admin.destroy',$admin->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" data-id="{{$admin->id}}" class="delete btn btn-sm btn-danger mx-1"><i class="fa-solid fa-trash "></i></button>
                                    </form>
                                    </div>                         
                                </td>       
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-12 my-4">
            <a href="{{route('admin.create')}}"> <button class=" btn btn-primary btn-md">➥ Create</button></a>
            </div>
        </div> <!-- end row -->
<!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection
