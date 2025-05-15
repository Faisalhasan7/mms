@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('admin.meal_cost_create')}}" class="btn btn-blue">Add Meal Cost</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Border Meal Cost</h4>
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
                                <th>Border Name</th>
                                <th>Flat No</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Date</th>
                                <th>Cost</th>
                                <th>Payment</th>
                                <th>Advance</th>
                                <th>Due</th>
                                <th>Manager Pay</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($meal_costs as $key => $meal)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$meal->border_detail->border_name}}</td>
                                    <td>{{$meal->border_detail->flat_no}}</td>
                                    <td>{{$meal->year}}</td>
                                    <td>{{$meal->month}}</td>
                                    <td>{{$meal->date}}</td>
                                    <td>৳ {{$meal->cost}}</td>
                                    <td>৳ {{$meal->payment}}</td>
                                    <td>৳ {{$meal->advance}}</td>
                                    <td class="bg-danger text-white fw-bold">৳ {{$meal->due}}</td>
                                    <td class="bg-warning text-blue fw-bold">৳ {{$meal->cost<($meal->payment + $meal->advance)?(($meal->payment + $meal->advance)-$meal->cost):0}}</td>
                                    <td>{{$meal->status}}</td>
                                    <td>
                                        @can("meal.edit")
                                        <a href="{{route('admin.meal_cost_edit',$meal->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil"></i> </a>
                                        @endcan
                                        @can("meal.delete")
                                        <a href="{{route('admin.meal_cost_delete',$meal->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash"></i> </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                            <tfoot>
                            <?php $month = \App\Models\MealCost::where('month', date('F'));?>
                            <tr>
                                <td colspan="6" class="text-blue fw-bold">Total</td>
                                <td class="text-danger fw-bold">৳{{$month->sum("cost")}}</td>
                                <td class="text-danger fw-bold">৳{{$month->sum("payment")}}</td>
                                <td class="text-danger fw-bold">৳{{$month->sum("advance")}}</td>
                                <td class="text-danger fw-bold">৳{{$month->sum("due")}}</td>
                                <td colspan="2" class="text-danger fw-bold">৳{{$month->sum("cost")<($month->sum("payment") + $month->sum("advance"))?(($month->sum("payment") + $month->sum("advance"))-$month->sum("cost")):0}}</td>

                            </tr>
                            </tfoot>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>


@endsection
