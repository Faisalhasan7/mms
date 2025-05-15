@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Product Buy</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.product_buy_store')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="staff_id" class="form-label">Staff Name</label>
                                            <select name="staff_id" class="js-example-basic-single form-control @error('staff_id') is-invalid @enderror" id="staff_id">
                                                <option selected disabled >Select Border Name </option>
                                                @foreach($staffs as $staff)
                                                    <option value="{{$staff->id}}">{{$staff->staff_name}} </option>
                                                @endforeach
                                            </select>
                                            @error('staff_id')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="flat_no" class="form-label">Flat No</label>
                                            <input type="text" class="form-control @error('flat_no') is-invalid @enderror" name="flat_no" id="flat_no" value="{{old('flat_no')}}">
                                            @error('flat_no')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

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
                                            <label for="month" class="form-label">Buy Month</label>
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
                                            <label for="product_name" class="form-label">Product Name</label>
                                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="product_name" value="{{old('product_name')}}">
                                            @error('product_name')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{old('price')}}">
                                            @error('price')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" min="1" value="{{old('quantity')}}">
                                            @error('quantity')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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

