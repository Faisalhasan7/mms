@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('admin.total_bill_create')}}" class="btn btn-blue">Add Billing</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Billings</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive  w-100 table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Staff Name</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Date</th>
                                <th>Bill Name</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($billings as $key => $bill)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$bill->staff->staff_name}}</td>
                                    <td>{{$bill->year}}</td>
                                    <td>{{$bill->month}}</td>
                                    <td>{{$bill->date}}</td>
                                    <td class="text-danger fw-bold">{!! Str::limit($bill->bill_name,20) !!}</td>
                                    <td>৳ {{$bill->amount}}</td>
                                    <td>{{$bill->status}}</td>
                                    <td>
                                        @can("bill.edit")
                                        <a href="{{route('admin.total_bill_edit',$bill->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil"></i> </a>
                                        @endcan
                                        @can("bill.delete")
                                        <a href="{{route('admin.total_bill_delete',$bill->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash"></i> </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                            <tr>
                                <td colspan="6" class="text-blue fw-bold">Total</td>
                                <td colspan="3" class="text-danger fw-bold">৳ {{\App\Models\TotalBilling::where('month',date('F'))->sum('amount')}}</td>
                            </tr>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>


@endsection
