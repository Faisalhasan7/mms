@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title"> Border Rent Update</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.border_rent_update',$rent->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="border_name" class="form-label">Border Name</label>
                                            <select name="border_detail_id" class="form-control @error('border_detail_id') is-invalid @enderror" id="border_name">
                                                @foreach($border_details as $border_detail)
                                                <option {{$border_detail->id === $rent->border_detail_id ? 'selected':""}} value="{{$border_detail->id}}">{{$border_detail->border_name}}</option>
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
                                            <label for="month" class="form-label">Rent Month</label>
                                            <select name="month" class="form-select @error('month') is-invalid @enderror" id="month">
                                                <option selected disabled >Select Month </option>
                                                <option {{$rent->month === 'January' ? 'selected' :""}} value="January">January</option>
                                                <option {{$rent->month === 'February' ? 'selected' :""}} value="February">February</option>
                                                <option {{$rent->month === 'March' ? 'selected' :""}} value="March">March</option>
                                                <option {{$rent->month === 'April' ? 'selected' :""}} value="April">April</option>
                                                <option {{$rent->month === 'May' ? 'selected' :""}} value="May">May</option>
                                                <option {{$rent->month === 'June' ? 'selected' :""}} value="June">June</option>
                                                <option {{$rent->month === 'July' ? 'selected' :""}} value="July">July</option>
                                                <option {{$rent->month === 'August' ? 'selected' :""}} value="August">August</option>
                                                <option {{$rent->month === 'September' ? 'selected' :""}} value="September">September</option>
                                                <option {{$rent->month === 'October' ? 'selected' :""}} value="October">October</option>
                                                <option {{$rent->month === 'November' ? 'selected' :""}} value="November">November</option>
                                                <option {{$rent->month === 'December' ? 'selected' :""}} value="December">December</option>
                                            </select>
                                            @error('date')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Payment Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{$rent->date}}">
                                            @error('date')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount" value="{{$rent->amount}}">
                                            @error('amount')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="rentStatus" class="form-label">Rent Status</label>
                                                <select name="status" class="form-control @error('status') is-invalid @enderror" id="rentStatus">
                                                    <option {{$rent->status === 'Approved' ? 'selected' : ""}} value="Approved">Approved</option>
                                                    <option {{$rent->status === 'Pending' ? 'selected' : ""}} value="Pending">Pending</option>
                                                </select>
                                                @error('border_detail_id')
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
    <script type="text/javascript">
        $(document).ready(function(){
            $("#img").change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $("#showImg").attr('src',e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>


@endsection

