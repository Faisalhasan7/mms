@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Update Border Meal Cost</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.meal_cost_update',$meal->id)}}" method="POST" enctype="multipart/form-data">
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
                                            <label for="month" class="form-label">Meal Cost Month</label>
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
                                            <label for="cost" class="form-label">Cost</label>
                                            <input type="number" class="form-control @error('cost') is-invalid @enderror" name="cost" id="date" value="{{$meal->cost}}">
                                            @error('cost')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="payment" class="form-label">Payment Amount</label>
                                            <input type="number" class="form-control @error('payment') is-invalid @enderror" name="payment" id="date" value="{{$meal->payment}}">
                                            @error('payment')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="advance" class="form-label">Advance</label>
                                            <input type="number" class="form-control @error('advance') is-invalid @enderror" name="advance" id="date" value="{{$meal->advance}}">
                                            @error('advance')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="due" class="form-label">Due Amount</label>
{{--                                            <input type="number" class="form-control @error('due') is-invalid @enderror" name="due" id="date" value="{{$meal->due}}">--}}
                                            <p class="text-danger fw-bold fs-6">{{$meal->due}}</p>
                                            @error('due')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="costStatus" class="form-label">Status</label>
                                            <select name="status" class="form-select @error('status') is-invalid @enderror" id="costStatus">
                                                <option selected disabled >Select Breakfast </option>
                                                <option {{$meal->status === 'Pending' ? 'selected' : ""}} value="Pending">Pending</option>
                                                <option {{$meal->status === 'Approved' ? 'selected' : ""}} value="Approved">Approved</option>

                                            </select>
                                            @error('status')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-blue waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script >
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

@endsection

