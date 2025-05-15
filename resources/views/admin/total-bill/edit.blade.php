@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Update Billing </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.total_bill_update',$bill->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="staff_id" class="form-label">Staff Name</label>
                                            <select name="staff_id" class="js-example-basic-single form-control @error('staff_id') is-invalid @enderror" id="staff_id">
                                                <option selected disabled >Select Border Name </option>
                                                @foreach($staffs as $staff)
                                                    <option {{$staff->id === $bill->staff_id ? 'selected' :""}} value="{{$staff->id}}">{{$staff->staff_name}} </option>
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
                                            <label for="month" class="form-label">Billing Month</label>
                                            <select name="month" class="form-select @error('month') is-invalid @enderror" id="month">
                                                <option selected disabled >Select Month </option>
                                                <option {{$bill->month === 'January' ? 'selected' :""}} value="January">January</option>
                                                <option {{$bill->month === 'February' ? 'selected' :""}} value="February">February</option>
                                                <option {{$bill->month === 'March' ? 'selected' :""}} value="March">March</option>
                                                <option {{$bill->month === 'April' ? 'selected' :""}} value="April">April</option>
                                                <option {{$bill->month === 'May' ? 'selected' :""}} value="May">May</option>
                                                <option {{$bill->month === 'June' ? 'selected' :""}} value="June">June</option>
                                                <option {{$bill->month === 'July' ? 'selected' :""}} value="July">July</option>
                                                <option {{$bill->month === 'August' ? 'selected' :""}} value="August">August</option>
                                                <option {{$bill->month === 'September' ? 'selected' :""}} value="September">September</option>
                                                <option {{$bill->month === 'October' ? 'selected' :""}} value="October">October</option>
                                                <option {{$bill->month === 'November' ? 'selected' :""}} value="November">November</option>
                                                <option {{$bill->month === 'December' ? 'selected' :""}} value="December">December</option>
                                            </select>
                                            @error('date')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Billing Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{$bill->date}}">
                                            @error('date')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount" value="{{$bill->amount}}">
                                            @error('amount')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="statusUp" class="form-label">Status</label>
                                            <select name="status" class="form-select @error('status') is-invalid @enderror" id="statusUp">
                                                <option selected disabled >Select Status </option>
                                                <option {{$bill->status === 'Pending' ? 'selected' :""}} value="Pending">Pending</option>
                                                <option {{$bill->status === 'Approved' ? 'selected' :""}} value="Approved">Approved</option>
                                            </select>
                                            @error('status')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bill_name" class="form-label">Billing Name</label>
                                            <textarea name="bill_name" class="form-control @error('bill_name') is-invalid @enderror" id="ashik" cols="30" rows="4">{{$bill->bill_name}}</textarea>
                                            @error('bill_name')
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

