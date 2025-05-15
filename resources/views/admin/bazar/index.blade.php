@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('admin.total_bazar_create')}}" class="btn btn-blue">Add New Bazar</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Bazar List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive table-striped w-100">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Staff Name</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Date</th>
                                <th>Bazar Cost</th>
                                <th>Bazar List</th>
                                <th>Comments</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($bazars as $key => $bazar)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$bazar->staff->staff_name}}</td>
                                    <td>{{$bazar->year}}</td>
                                    <td>{{$bazar->month}}</td>
                                    <td>{{$bazar->bazar_date}}</td>
                                    <td>৳ {{$bazar->bazar_amount}}</td>
                                    <td>{!! Str::limit($bazar->bazar_list,20) !!}</td>
                                    <td>{!! Str::limit($bazar->comments,20) !!}</td>
                                    <td>{{$bazar->status}}</td>
                                    <td>
                                        <a href="{{route('admin.total_bazar_edit',$bazar->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil"></i> </a>
                                        <a href="{{route('admin.total_bazar_delete',$bazar->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5" class="text-blue fw-bold">Running Month Total</td>
                                <td colspan="5" class="text-danger fw-bold">৳ {{\App\Models\Bazar::where('month',date('F'))->sum('bazar_amount')}}</td>
                            </tr>
                            </tfoot>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>


@endsection
