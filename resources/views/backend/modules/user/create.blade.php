@extends('backend.layouts.master')

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
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">                        
                        @if(isset($admin))
                        <h4 class="card-title mb-4">Edit Admin</h4>
                        @else
                        <h4 class="card-title mb-4">Create Admin</h4>
                        @endif

                        <form  method="post"
                        action="{{(@$admin) ? route('admin.update',$admin->id) : route('admin.store')}}" enctype="multipart/form-data">
                            @csrf

                                @if(isset($admin))
                                @method('put')
                                @endif
                            <div class="row">                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="formrow-email-input" value="{{@$admin->name}}" placeholder="Enter Your Name">
                                        @error('name')
                                        <code>*{{$message}}</code>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-password-input" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="formrow-password-input" value="{{@$admin->email}}" placeholder="Enter Your Email">
                                        @error('email')
                                        <code>*{{$message}}</code>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="formrow-inputCity" value="{{@$admin->password}}" placeholder="Enter Your Password">
                                        @error('password')
                                        <code>*{{$message}}</code>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label">Upload Image</label>
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="form-control" id="customFile">
                                        </div>
                                        @error('photo')
                                        <code>*{{$message}}</code>
                                        @enderror
                                    </div>
                                </div>                              
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        
    </div> <!-- container-fluid -->
</div>
@endsection
