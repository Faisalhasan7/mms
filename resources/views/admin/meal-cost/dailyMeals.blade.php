@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('admin.total_meal_create')}}" class="btn btn-blue">Add Border Daily Meal</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Border Border Daily Meal</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive table-striped w-100">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Flat No</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Date</th>
                                <th>Breakfast</th>
                                <th>Lunch</th>
                                <th>Dinner</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($total_meals as $key => $border)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$border->border_detail->border_name}}</td>
                                    <td>{{$border->border_detail->flat_no}}</td>
                                    <td>{{$border->year}}</td>
                                    <td>{{$border->month}}</td>
                                    <td>{{$border->date}}</td>
                                    <td>{{$border->breakfast}}</td>
                                    <td>{{$border->lunch}}</td>
                                    <td>{{$border->dinner}}</td>
                                    <td>
                                        <a href="{{route('admin.total_meal_edit',$border->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil"></i> </a>
                                        <a href="{{route('admin.total_meal_delete',$border->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash"></i> </a>
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
