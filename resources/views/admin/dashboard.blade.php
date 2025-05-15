@extends('admin.layouts.master')
@section('admin_content')
<?php
    $month = \App\Models\TotalMeal::where('month',date('F'));
    $monthly_meal = $month->sum('breakfast')+$month->sum('lunch')+$month->sum('dinner');
    $borders = \App\Models\BorderDetail::whereDay('created_at',date('d'));
    $monthly_borders = \App\Models\BorderDetail::whereMonth('created_at',date('m'));
    $border_rents = \App\Models\BorderRentCellection::whereDay('date',date('d'))->where('status','Approved');
    $monthly_border_rents = \App\Models\BorderRentCellection::where('date',date('m'))->where('status','Approved');
    $meal_costs = \App\Models\MealCost::whereDay('date',date('d'));
    $monthly_meal_costs = \App\Models\MealCost::whereMonth('date',date('m'));

    //=====Costs=====
    $products = \App\Models\ProductBuy::whereDay('date',date('d'));
    $monthly_products = \App\Models\ProductBuy::whereMonth('date',date('m'))->where('status','Approved');
    $monthly_bazars = \App\Models\Bazar::where('month',date('F'))->where('status','Approved');
    $daily_bazars = \App\Models\Bazar::whereDay('bazar_date',date('d'))->where('status','Approved');
    $staffs = \App\Models\StaffSalary::whereDay('date',date('d'));
    $monthly_staffs = \App\Models\StaffSalary::whereMonth('date',date('m'));
    $billings = \App\Models\TotalBilling::whereDay('date',date('d'));
    $monthly_billings = \App\Models\TotalBilling::whereMonth('date',date('m'))->where('status','Approved');
    $today_collections = $borders->sum('service')+$borders->sum('advance')+$border_rents->sum('amount')+$meal_costs->sum('payment')+$meal_costs->sum('advance');
//    $today_collections = $borders->sum('service')+$borders->sum('rent')+$borders->sum('advance')+$border_rents->sum('amount')+$meal_costs->sum('payment')+$meal_costs->sum('advance');
    $today_costs = $products->sum('sub_total')+$staffs->sum('amount')+$billings->sum('amount')+$daily_bazars->sum('bazar_amount');
    $monthly_collections = $monthly_borders->sum('service')+$monthly_borders->sum('rent')+$monthly_borders->sum('advance')+$monthly_border_rents->sum('amount')+$monthly_meal_costs->sum('payment')+$monthly_meal_costs->sum('advance');
    $monthly_costs = $monthly_products->sum('sub_total')+$monthly_staffs->sum('amount')+$monthly_billings->sum('amount')+$monthly_bazars->sum('bazar_amount');

    $meal_rate = $monthly_bazars->sum('bazar_amount')? $monthly_bazars->sum('bazar_amount') / $monthly_meal : 0 ;

    $currentDayMonth = \Carbon\Carbon::now()->format('d-m');

//    $birthdays = \App\Models\BorderDetail::whereRaw("DATE_FORMAT(dob,'%d-%m') =?",[$currentDayMonth])->get();
    $birthdays = \App\Models\BorderDetail::whereRaw("DATE_FORMAT(dob,'%d-%m') =?",[$currentDayMonth])->get();


?>
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                <i class="fe-heart font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">৳<span data-plugin="counterup">{{$today_collections}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Today's Collect</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                <i class="fe-shopping-cart font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$monthly_meal}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Monthly Meals</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">৳<span data-plugin="counterup">{{$today_costs}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Today's Costs</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                <i class="fe-eye font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h4 class="text-dark mt-1"><span >{{number_format($meal_rate,2)}}</span></h4>
                                <p class="text-muted mb-1 text-truncate">Meal Rate</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-xl-12 order-xl-12 order-1">
            <div class="card" dir="ltr">
                <div class="card-body">
                    <h4 class="header-title mb-3">Status Charts</h4>

                    <div class="">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div >
                                    <canvas id="pieChart" width="220" height="220" style="display: inline-block; width: 220px; height: 220px; vertical-align: top;"></canvas>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 text-left">
                                <div class="d-flex justify-content-between align-items-center px-3 py-1" 
                                     style="background: linear-gradient(45deg, #007bff, #6610f2); color: #fff; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                                    <h3 class="m-0 text-white">🎉 Birthday List of - </h3>
                                    <span style="background: #dc3545; color: #fff; 
                                                 width: 60px; height: 60px; 
                                                 display: flex; justify-content: center; align-items: center; 
                                                 border-radius: 50%; 
                                                 font-weight: bold; font-size: 1.2rem; 
                                                 box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);">
                                        {{ count($birthdays) }}
                                    </span>
                                </div>
                                <!-- 
                                <ul>
                                    @foreach($birthdays as $birth)
                                        <li class="my-1" style="list-style: none;"><a href="{{route('admin.border_details_show',$birth->id)}}" class="badge bg-success text-white fw-bold fs-5" target="_blank">{{$loop->iteration}}-{{$birth->border_name}}</a></li>
                                    @endforeach

                                </ul> -->
                                <ul class="p-0 mt-2" style="list-style: none;">
                                    @foreach($birthdays as $birth)
                                        <li class="mb-2">
                                            <a href="{{ route('admin.border_details_show', $birth->id) }}" 
                                               class="d-block py-2 px-3 text-left" 
                                               style="background: #28a745; color: #fff; 
                                                      font-weight: bold; font-size: 1rem; 
                                                      border-radius: 5px; 
                                                      text-decoration: none; 
                                                      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2); 
                                                      transition: all 0.3s ease;" 
                                               target="_blank">
                                                {{ $loop->iteration }} - {{ $birth->border_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>


                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="card" >
                                    <div class="card-body">
                                        <h4 class="card-title">Running Meal Rate</h4>
                                        <div class="table-responsive">
                                            <table class="table table-centered">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th style="width: 10%">Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <b>Number Of Meals</b> <br/>
                                                    </td>
                                                    <td>{{$monthly_meal}}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>Monthly Bazar</b> <br/>
                                                    </td>
                                                    <td>৳ {{$monthly_bazars->sum('bazar_amount')}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h4 class="text-dark mt-1"><strong>Meal Rate: &nbsp;</strong><span >৳ {{number_format($meal_rate,2)}}</span></h4>
{{--                                        <form action="" method="post">--}}
{{--                                            @csrf--}}
{{--                                            --}}
{{--                                        </form>--}}
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
    </div>
    <!-- end row -->


</div> <!-- container -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('pieChart').getContext('2d');
        var income = {{ $monthly_collections }};
        var cost = {{ $monthly_costs }};

        var data = {
            labels: ['Monthly Collections = ৳ '+income, 'Monthly Costs = ৳ '+cost],
            datasets: [{
                data: [income, cost],
                backgroundColor: ['#36A2EB', '#FFCE56'],
            }]
        };

        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
        });
    });
</script>

@endsection
