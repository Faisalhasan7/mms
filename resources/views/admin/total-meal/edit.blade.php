@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Border Daily Meal</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.total_meal_update',$meal->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="border_name" class="form-label">Border Name</label>
                                            <select name="border_detail_id" class="form-control @error('border_detail_id') is-invalid @enderror" id="border_name">
                                                @foreach($border_details as $border_detail)
                                                    <option {{$border_detail->id === $meal->border_detail_id ? 'selected':""}} value="{{$border_detail->id}}">{{$border_detail->border_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('border_detail_id')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{--                                    <div class="col-md-6">--}}
                                    {{--                                        <div class="mb-3">--}}
                                    {{--                                            <label for="year" class="form-label">Year</label>--}}
                                    <input type="hidden" class="form-control @error('year') is-invalid @enderror" name="year" id="year" value="{{date('Y')}}">
                                    @error('year')
                                    <span class="text-danger fw-bold">{{$message}}</span>
                                    @enderror
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="month" class="form-label">Meal's Month</label>
                                            <select name="month" class="form-select @error('month') is-invalid @enderror" id="month">
                                                <option selected disabled >Select Month </option>
                                                <option {{$meal->month === 'January' ? 'selected' :""}} value="January">January</option>
                                                <option {{$meal->month === 'February' ? 'selected' :""}} value="February">February</option>
                                                <option {{$meal->month === 'March' ? 'selected' :""}} value="March">March</option>
                                                <option {{$meal->month === 'April' ? 'selected' :""}} value="April">April</option>
                                                <option {{$meal->month === 'May' ? 'selected' :""}} value="May">May</option>
                                                <option {{$meal->month === 'June' ? 'selected' :""}} value="June">June</option>
                                                <option {{$meal->month === 'July' ? 'selected' :""}} value="July">July</option>
                                                <option {{$meal->month === 'August' ? 'selected' :""}} value="August">August</option>
                                                <option {{$meal->month === 'September' ? 'selected' :""}} value="September">September</option>
                                                <option {{$meal->month === 'October' ? 'selected' :""}} value="October">October</option>
                                                <option {{$meal->month === 'November' ? 'selected' :""}} value="November">November</option>
                                                <option {{$meal->month === 'December' ? 'selected' :""}} value="December">December</option>
                                            </select>
                                            @error('date')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Payment Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{$meal->date}}">
                                            @error('date')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="breakfast" class="form-label">Breakfast</label>
                                            <select name="breakfast" class="form-select @error('breakfast') is-invalid @enderror" id="breakfast">
                                                <option selected disabled >Select Breakfast </option>
                                                <option {{$meal->breakfast === '0.5' ? 'selected' : ""}} value="0.5">Half</option>
                                                <option {{$meal->breakfast === '1' ? 'selected' : ""}} value="1">1</option>
                                                <option {{$meal->breakfast === '2' ? 'selected' : ""}} value="2">2</option>
                                                <option {{$meal->breakfast === '3' ? 'selected' : ""}} value="3">3</option>
                                                <option {{$meal->breakfast === '4' ? 'selected' : ""}} value="4">4</option>
                                                <option {{$meal->breakfast === '5' ? 'selected' : ""}} value="5">5</option>
                                            </select>
                                            @error('breakfast')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lunch" class="form-label">Lunch</label>
                                            <select name="lunch" class="form-select @error('lunch') is-invalid @enderror" id="lunch">
                                                <option selected disabled >Select Breakfast </option>
                                                <option {{$meal->lunch === '1' ? 'selected' : ""}} value="1">1</option>
                                                <option {{$meal->lunch === '2' ? 'selected' : ""}} value="2">2</option>
                                                <option {{$meal->lunch === '3' ? 'selected' : ""}} value="3">3</option>
                                                <option {{$meal->lunch === '4' ? 'selected' : ""}} value="4">4</option>
                                                <option {{$meal->lunch === '5' ? 'selected' : ""}} value="5">5</option>
                                            </select>
                                            @error('lunch')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dinner" class="form-label">Dinner</label>
                                            <select name="dinner" class="form-select @error('dinner') is-invalid @enderror" id="dinner">
                                                <option selected disabled >Select Breakfast </option>
                                                <option {{$meal->dinner === '1' ? 'selected' : ""}} value="1">1</option>
                                                <option {{$meal->dinner === '2' ? 'selected' : ""}} value="2">2</option>
                                                <option {{$meal->dinner === '3' ? 'selected' : ""}} value="3">3</option>
                                                <option {{$meal->dinner === '4' ? 'selected' : ""}} value="4">4</option>
                                                <option {{$meal->dinner === '5' ? 'selected' : ""}} value="5">5</option>
                                            </select>
                                            @error('dinner')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-blue waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

@endsection

