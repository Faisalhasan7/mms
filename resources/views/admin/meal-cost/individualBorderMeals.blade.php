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
                    <h4 class="page-title">{{request()->month}} - Borders Meal</h4>
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
                                <th>Border Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($monthly as $key => $meal)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$meal->border_detail->border_name}}</td>
                                    <td>
                                        <a href="{{url('admin/meal-individualMeals/'.request()->month.'/'.$meal->border_detail_id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-eye"></i> </a>
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
