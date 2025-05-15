@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('admin.border_details_create')}}" class="btn btn-blue">Add new Border</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Border List</h4>
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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Joining Date</th>
                                <th>Flat No</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($border_details as $key => $border)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$border->border_name}}</td>
                                    <td><img src="{{$border->image ? "/".$border->image : asset('/backend/assets/no_image.jpg')}}" height="50px" width="50px" class="rounded-circle " alt=""></td>
                                    <td>{{$border->email}}</td>
                                    <td>{{$border->mobile}}</td>
                                    <td>{{$border->border_joining_date}}</td>
                                    <td>{{$border->flat_no}}</td>
                                    <td>
                                        <a href="{{route('admin.pay_receipt',$border->id)}}" class="btn btn-success rounded-pill waves-effect waves-light" title="Receipt" target="_blank"><i class="fas fa-file-invoice"></i> </a>
                                        @can('border.edit')
                                        <a href="{{route('admin.border_details_edit',$border->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil"></i> </a>
                                        @endcan
                                        <a href="{{route('admin.border_details_show',$border->id)}}" class="btn btn-info rounded-pill waves-effect waves-light" title="Details"><i class="fa fa-eye"></i> </a>
                                        @can('border.delete')
                                        <a href="{{route('admin.border_details_delete',$border->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash"></i> </a>
                                        @endcan
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
