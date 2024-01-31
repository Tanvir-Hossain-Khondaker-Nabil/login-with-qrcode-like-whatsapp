@extends('backend.layouts.master')
@section('title','Receiver')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Receivers</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Receiver</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
<!-- end row -->
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
        
                <h4 class="card-title">Receiver Table</h4>
                <p class="card-title-desc">This view creates a dynamic data table with some features like filters, pagination and search input, you can customize the headers, the data to be displayed for each row.
                </p>
        
                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="datatable"
                                class="table table-bordered dt-responsive dataTable no-footer dtr-inline"
                                role="grid" aria-describedby="datatable_info" style="width: 1013px;">
                                <thead>
                                    <tr role="row">
                                        <th style="width: 159px;">ID</th>
                                        <th style="width: 242px;">Name</th>
                                        <th style="width: 115px;">Email </th>
                                        <th style="width: 115px;">Phone</th>
                                        <th style="width: 52px;" >Amount</th>
                                        <th style="width: 81px;" >Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sl=1 @endphp
                                    @foreach($receivers as $receiver)
                                    <tr>
                                        <td>{{$sl++}}</td><td>{{$receiver->name}}</td>                
                                        <td>{{$receiver->email}}</td>
                                        <td>{{$receiver->phone}}</td>
                                        <td>{{$receiver->amount}}</td>
                                        <td>
                                            <div class="d-flex">
                                            <a href="{{route('receiver.edit',$receiver->id)}}"><button class="btn btn-sm btn-warning"><i class="fa-solid fa-edit "></i></button></a> 
                                            <form method="post" id="{{'form_'.$receiver->id}}" action="{{route('receiver.destroy',$receiver->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" data-id="{{$receiver->id}}" class="delete btn btn-sm btn-danger mx-1"><i class="fa-solid fa-trash "></i></button>
                                            </form>
                                            </div>                         
                                        </td>      
                                    </tr>
                                    @endforeach
                                </tbody>                                
                            </table>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-12 my-4">
    <a href="{{route('receiver.create')}}"> <button class=" btn btn-primary btn-md">➥ Create</button></a>
    </div>
</div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection