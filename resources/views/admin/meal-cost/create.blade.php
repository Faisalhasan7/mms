@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Border Meal Cost</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.meal_cost_store')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="border_name" class="form-label">Border Name - Flat No</label>
                                            <select name="border_detail_id" class="js-example-basic-single form-control @error('border_detail_id') is-invalid @enderror" id="border_name">
                                                <option selected disabled >Select Border Name </option>
                                                @foreach($border_details as $border_detail)
                                                <option value="{{$border_detail->id}}">{{$border_detail->border_name}} &nbsp; -- &nbsp;{{$border_detail->flat_no}}</option>
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
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                            @error('date')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Payment Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{old('date')}}">
                                            @error('date')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="cost" class="form-label">Cost</label>
                                            <input type="cost" class="form-control @error('cost') is-invalid @enderror" name="cost" id="date" value="{{old('cost')}}">
                                            @error('cost')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="payment" class="form-label">Payment Amount</label>
                                            <input type="payment" class="form-control @error('payment') is-invalid @enderror" name="payment" id="date" value="{{old('payment')}}">
                                            @error('payment')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="advance" class="form-label">Advance</label>
                                            <input type="advance" class="form-control @error('advance') is-invalid @enderror" name="advance" id="date" value="{{old('advance')}}">
                                            @error('dinner')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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

