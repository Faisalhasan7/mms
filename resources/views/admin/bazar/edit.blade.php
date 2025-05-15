@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Update Bazar List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.total_bazar_update',$bazar->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="staff_id" class="form-label">Staff Name</label>
                                            <select name="staff_id" class="js-example-basic-single form-control @error('staff_id') is-invalid @enderror" id="staff_id">
                                                <option selected disabled >Select Border Name </option>
                                                @foreach($staffs as $staff)
                                                    <option {{$staff->id === $bazar->staff_id ? 'selected' :""}} value="{{$staff->id}}">{{$staff->staff_name}} </option>
                                                @endforeach
                                            </select>
                                            @error('staff_id')
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
                                            <label for="month" class="form-label">Rent Month</label>
                                            <select name="month" class="form-select @error('month') is-invalid @enderror" id="month">
                                                <option selected disabled >Select Month </option>
                                                <option {{$bazar->month === 'January' ? 'selected' :""}} value="January">January</option>
                                                <option {{$bazar->month === 'February' ? 'selected' :""}} value="February">February</option>
                                                <option {{$bazar->month === 'March' ? 'selected' :""}} value="March">March</option>
                                                <option {{$bazar->month === 'April' ? 'selected' :""}} value="April">April</option>
                                                <option {{$bazar->month === 'May' ? 'selected' :""}} value="May">May</option>
                                                <option {{$bazar->month === 'June' ? 'selected' :""}} value="June">June</option>
                                                <option {{$bazar->month === 'July' ? 'selected' :""}} value="July">July</option>
                                                <option {{$bazar->month === 'August' ? 'selected' :""}} value="August">August</option>
                                                <option {{$bazar->month === 'September' ? 'selected' :""}} value="September">September</option>
                                                <option {{$bazar->month === 'October' ? 'selected' :""}} value="October">October</option>
                                                <option {{$bazar->month === 'November' ? 'selected' :""}} value="November">November</option>
                                                <option {{$bazar->month === 'December' ? 'selected' :""}} value="December">December</option>
                                            </select>
                                            @error('month')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Bazar Date</label>
                                            <input type="date" class="form-control @error('bazar_date') is-invalid @enderror" name="bazar_date" id="date" value="{{$bazar->bazar_date}}">
                                            @error('bazar_date')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bazar_amount" class="form-label">Price</label>
                                            <input type="number" class="form-control @error('bazar_amount') is-invalid @enderror" name="bazar_amount" id="bazar_amount" value="{{$bazar->bazar_amount}}">
                                            @error('bazar_amount')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="comments" class="form-label">Comments</label>
                                            <input type="text" class="form-control @error('comments') is-invalid @enderror" name="comments" id="comments" min="1" value="{{$bazar->comments}}">
                                            @error('comments')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="productStatus" class="form-label">Status</label>
                                            <select name="status" class="form-select @error('status') is-invalid @enderror" id="productStatus">
                                                <option selected disabled >Select Status </option>
                                                <option {{$bazar->status === 'Pending' ? 'selected' :""}} value="Pending">Pending</option>
                                                <option {{$bazar->status === 'Approved' ? 'selected' :""}} value="Approved">Approved</option>
                                            </select>
                                            @error('status')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bazar_list" class="form-label">Bazar List</label>
                                            <textarea name="bazar_list" class="form-control @error('bazar_list') is-invalid @enderror" id="ashik" cols="30" rows="4">{{$bazar->bazar_list}}</textarea>
                                            @error('bazar_list')
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

