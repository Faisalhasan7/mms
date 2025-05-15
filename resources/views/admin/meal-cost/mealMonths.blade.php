@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('admin.total_meal_create')}}" class="btn btn-blue">Add Border Meal</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Border Meal Months</h4>
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
                                <th>Year</th>
                                <th>Month</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($meal_costs as $key => $meal)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{date('Y')}}</td>
                                    <td>{{$meal->month}}</td>
                                    <td>
                                        <a href="{{route('admin.monthlyMeals',$meal->month)}}" class="btn btn-blue rounded-pill waves-effect waves-light">All Borders Meal By Date </a>
                                        <a href="{{route('admin.individualBorderMeals',$meal->month)}}" class="btn btn-danger rounded-pill waves-effect waves-light">Individual Borders Meal </a>
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
