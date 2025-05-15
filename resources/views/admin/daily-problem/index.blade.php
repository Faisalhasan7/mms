@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('admin.daily_problem_create')}}" class="btn btn-blue">Add Daily Problem</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Daily Problems</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive  w-100 table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Problem Name</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Date</th>
                                <th>Solutions</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($daily_problems as $key => $problem)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$problem->problem_name}}</td>
                                    <td>{{$problem->year}}</td>
                                    <td>{{$problem->month}}</td>
                                    <td>{{$problem->date}}</td>
                                    <td >{{$problem->solution}}</td>
                                    <td>
                                        @can("problem.edit")
                                        <a href="{{route('admin.daily_problem_edit',$problem->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil"></i> </a>
                                        @endcan
                                        @can("problem.delete")
                                        <a href="{{route('admin.daily_problem_delete',$problem->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash"></i> </a>
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
