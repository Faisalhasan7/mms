@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('admin.staff_salary_create')}}" class="btn btn-blue">Add Staff Salary</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Staff Salary List</h4>
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
                                <th>Staff Name</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Due</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($staff_salaries as $key => $salary)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$salary->staff->staff_name}}</td>
                                    <td>{{$salary->year}}</td>
                                    <td>{{$salary->month}}</td>
                                    <td>{{$salary->date}}</td>
                                    <td>৳ {{$salary->amount}}</td>
                                    <td>৳ {{$salary->due}}</td>
                                    <td>
                                        <a href="{{route('admin.staff_salary_edit',$salary->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil"></i> </a>
                                        <a href="{{route('admin.staff_salary_delete',$salary->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash"></i> </a>
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
