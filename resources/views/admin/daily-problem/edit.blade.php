@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Update Daily Problem </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.daily_problem_update',$problem->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row">


                                    {{--<div class="col-md-6">--}}
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
                                            <label for="month" class="form-label">Problem Month</label>
                                            <select name="month" class="form-select @error('month') is-invalid @enderror" id="month">
                                                <option selected disabled >Select Month </option>
                                                <option {{$problem->month === 'January' ? 'selected' :""}} value="January">January</option>
                                                <option {{$problem->month === 'February' ? 'selected' :""}} value="February">February</option>
                                                <option {{$problem->month === 'March' ? 'selected' :""}} value="March">March</option>
                                                <option {{$problem->month === 'April' ? 'selected' :""}} value="April">April</option>
                                                <option {{$problem->month === 'May' ? 'selected' :""}} value="May">May</option>
                                                <option {{$problem->month === 'June' ? 'selected' :""}} value="June">June</option>
                                                <option {{$problem->month === 'July' ? 'selected' :""}} value="July">July</option>
                                                <option {{$problem->month === 'August' ? 'selected' :""}} value="August">August</option>
                                                <option {{$problem->month === 'September' ? 'selected' :""}} value="September">September</option>
                                                <option {{$problem->month === 'October' ? 'selected' :""}} value="October">October</option>
                                                <option {{$problem->month === 'November' ? 'selected' :""}} value="November">November</option>
                                                <option {{$problem->month === 'December' ? 'selected' :""}} value="December">December</option>
                                            </select>
                                            @error('date')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Problem Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{$problem->date}}">
                                            @error('date')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="problem_name" class="form-label">Problem Name</label>
                                            <input type="text" class="form-control @error('problem_name') is-invalid @enderror" name="problem_name" id="problem_name" value="{{$problem->problem_name}}">
                                            @error('problem_name')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="solution" class="form-label">Solution</label>
                                            <textarea name="solution" id="solution" class="form-control @error('solution') is-invalid @enderror"cols="30" rows="10">{{$problem->solution}}</textarea>
                                            @error('solution')
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script >
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>


@endsection

