@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('admin.product_buy_create')}}" class="btn btn-blue">Add Product Buy</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Product Cost List</h4>
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
                                <th>Flat No</th>
                                <th>Month</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$product->staff->staff_name}}</td>
                                    <td>{{$product->flat_no}}</td>
                                    <td>{{$product->month}}</td>
                                    <td>{{$product->date}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>৳ {{$product->sub_total}}</td>
                                    <td>
                                        @can("meal.edit")
                                        <a href="{{route('admin.product_buy_edit',$product->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil"></i> </a>
                                        @endcan
                                        @can("meal.delete")
                                        <a href="{{route('admin.product_buy_delete',$product->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash"></i> </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="8" class="text-blue fw-bold">Total</td>
                                <td colspan="2" class="text-danger fw-bold">৳ {{\App\Models\ProductBuy::where('month',date('F'))->sum('sub_total')}}</td>
                            </tr>
                            </tfoot>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>


@endsection
