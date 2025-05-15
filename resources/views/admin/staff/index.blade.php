@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('admin.staff_create')}}" class="btn btn-blue">Add Staff</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Staff List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive  w-100">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Picture</th>
                                <th>Designation</th>
                                <th>Salary</th>
                                <th>Floor</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($staffs as $key => $staff)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$staff->staff_name}}</td>
                                    <td><img src="{{$staff->image?"/".$staff->image:asset('/backend/assets/no_image.jpg')}}" height="50px" width="50px" class="rounded-circle " alt=""></td>
                                    <td>{{$staff->staff_designation}}</td>
                                    <td>{{$staff->salary}}</td>
                                    <td>{{$staff->floor}}</td>
                                    <td>{{$staff->isActive==='1'?'Active':'In Active'}}</td>
                                    <td>
                                        <a href="{{route('admin.staff_edit',$staff->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil"></i> </a>
                                        <a href="{{route('admin.staff_delete',$staff->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>


@endsection
