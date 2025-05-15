@extends('admin.layouts.master')
@section('admin_content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{ route('admin.user_create') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Admin </a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Admin <span class="btn btn-danger">{{ count($users) }}</span> </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($users as $key=> $item)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td> <img src="{{ (!empty($item->photo)) ?  url("/".$item->photo) : ($item->staff_id !=null && $item->staff->image!=null?"/".$item->staff->image:url('/backend/assets/no_image.jpg')) }}" style="width:50px; height: 40px;"> </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @foreach($item->roles as $role)
                                            <span class="badge badge-pill bg-danger"> {{ $role->name }} </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($item->id !=1)
                                        <a href="{{ route('admin.user_edit',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
                                        <a href="{{ route('admin.user_delete',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->




    </div> <!-- container -->
@endsection
