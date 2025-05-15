@extends('admin.layouts.master')
@section('admin_content')
    <style>
        p{
            margin-bottom: 0.5rem;
        }
        table>tbody>tr>td{
            padding:0.5rem 0.5rem !important;
        }
    </style>
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Invoice</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo & title -->
                        <div class="clearfix">
                            <div class="float-start">
                                <div class="auth-logo">
                                    <div class="logo logo-dark">
                                        <span class="logo-lg">
                                            <img src="{{asset('public/backend/msj.jpeg')}}" alt="" height="80">
                                        </span>
                                    </div>

                                    <div class="logo logo-light">
                                        <span class="logo-lg">
                                            <img src="{{asset('public/backend/msj.jpeg')}}" alt="" height="80">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <h4 class="m-0 d-print-none">Payment Receipt</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                <div class="mt-1">
                                    <p class="d-flex justify-center"><strong>Border Name : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp; {{$border->border_name}}</span></p>
                                    <p class="d-flex justify-center"><strong>Border Email : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp; {{$border->email}}</span></p>
                                    <p class="d-flex justify-center"><strong>Border Flat No : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp; {{$border->flat_no}}</span></p>
                                    <p class="d-flex justify-center"><strong>Border Phone : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp; {{$border->mobile}}</span></p>
                                </div>

                                <div class="mt-1 float-end mx-2">
                                    <p><strong>Receipt Date : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp; {{now()->format('d-M-Y -- H:i A')}}</span></p>
                                    <p><strong>Status : </strong> <span class="float-end paidStatus"></span></p>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="month" class="form-label">Select Receipt Month</label>
                                            <select name="month" class="js-example-basic-single form-control" id="receiptMonth">
                                                <option selected disabled >Select Month </option>
                                                    <option value="01">January </option>
                                                    <option value="02">February </option>
                                                    <option value="03">March </option>
                                                    <option value="04">April </option>
                                                    <option value="05">May </option>
                                                    <option value="06">June </option>
                                                    <option value="07">July </option>
                                                    <option value="08">August </option>
                                                    <option value="09">September </option>
                                                    <option value="10">October </option>
                                                    <option value="11">November </option>
                                                    <option value="12">December </option>
                                            </select>
                                            @error('staff_id')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="table-responsive">
                                    <table class="table mt-1 table-centered">
                                        <thead>
                                        <tr><th>#</th>
                                            <th>Name</th>
                                            <th style="width: 10%">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <b>Number Of Meals</b> <br/>
                                            </td>
                                            <td class="meal_count">0</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <b>Per Meal Rate</b> <br/>
                                            </td>
                                            <td class="meal_rate">৳ 0.00</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <b>Room Rent</b> <br/>
                                            </td>
                                            <td class="room_rent">৳ 0</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <b>Khala Bill</b> <br/>
                                            </td>
                                            <td class="khala_bill">৳ 0</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>
                                                <b>Total Meal Costs</b> <br/>
                                            </td>
                                            <td class="meal_cost">৳ 0</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>
                                                <b>Extra Cost</b> <br/>
                                            </td>

                                            <td class=""> <span class="extra_bill">৳</span>
{{--                                                <input type="number" readonly class="extra_bills" style="width: 75px"><input--}}
{{--                                                    type="number" class="extra_bill_input" style="width: 75px">--}}
                                            </td>
                                        </tr>


                                        <tr>
                                            <td colspan="3"><p class="float-end px-2"><b class="mx-2">Costs:</b> <span  class="cost_sub_total">৳ 0.00</span></p></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>
                                                <b>Meal Advance Pay</b> <br/>
                                            </td>
                                            <td class="meal_advance_pay">৳ 0</td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <td>8</td>--}}
{{--                                            <td>--}}
{{--                                                <b>Meal Due Payment</b> <br/>--}}
{{--                                            </td>--}}
{{--                                            <td class="meal_due_pay">৳ 0</td>--}}
{{--                                        </tr>--}}
                                        <tr>
                                            <td>9</td>
                                            <td>
                                                <b>Room Rent Pay</b> <br/>
                                            </td>
                                            <td class="room_rent_pay">৳ 0</td>
                                        </tr>

                                        <tr>
                                            <td>10</td>
                                            <td>
                                                <b>Room Rent Due</b> <br/>
                                            </td>
                                            <td class="room_rent_due">৳ 0</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                                <div class="float-end mt-2">
                                    <p><b>Total Costs:</b> <span class="float-end total_cost_cal">৳ 00.00</span></p>
                                    <p><b>Total Advance:</b> <span class="float-end total_advance_cal"> &nbsp;&nbsp;&nbsp; ৳ 00.00</span></p>
                                    <p><b>Total Due:</b> <span class="float-end total_due_cal"> &nbsp;&nbsp;&nbsp; ৳ 00.00</span></p>
                                    <h4 class="text-danger pay_to"></h4>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                            <p class="text-center">Developed By: ASHIK. <i class="fa fa-mail-bulk"></i> &nbsp;ashikurrahmanbpi72@gmail.com <i class="fa fa-phone"></i>&nbsp; 01907371151, 01792104772</p>
                        <div class="mt-2 mb-1">
                            <div class="text-end d-print-none">
                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer me-1"></i> Print</a>
{{--                                <form action="" method="post">--}}
                                    <a href="#" class="btn btn-success waves-effect waves-light border_btn disabled">Send Mail</a>
{{--                                </form>--}}
                            </div>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script >
            // $('.extra_bill_input').on('change',function (){
            //     var extra_bill = $('.extra_bills').val() / $(this).val()
            //     $('.extra_bill').html("৳ "+(parseFloat(extra_bill).toFixed(2)))
            //     $('.extra_bill').val(parseFloat(extra_bill).toFixed(2))
            // })
            $('.border_btn').on('click', function (){
                var selectMonth = $("#receiptMonth").val();
                var border_id = {{$border->id}};
                var meal_count = $('.meal_count').val()
                var meal_rate = $('.meal_rate').val()
                var room_rent = $('.room_rent').val()
                var khala_bill = $('.khala_bill').val()
                var meal_cost = $('.meal_cost').val()
                var extra_bill = $('.extra_bill').val()
                var cost_sub_total = $('.cost_sub_total').val()
                var meal_advance_pay = $('.meal_advance_pay').val()
                var meal_due_pay = $('.meal_due_pay').val()
                var room_rent_pay = $('.room_rent_pay').val()
                var room_rent_due = $('.room_rent_due').val()
                var total_cost_cal = $('.total_cost_cal').val()
                var total_advance_cal = $('.total_advance_cal').val()
                var total_due_cal = $('.total_due_cal').val()
                var pay_to = $('.pay_to').val()
                var paidStatus = $('.paidStatus').val()

                $.ajax({
                    headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
                    url:"/admin/border-pay-receipt/mail/"+border_id+"/"+selectMonth,
                    type:"GET",
                    dataType:"json",
                    accept:'application/json',
                    contentType:'application/json',
                    data:{meal_count:meal_count,meal_rate:meal_rate,month:selectMonth,border_id:border_id,room_rent:room_rent,khala_bill:khala_bill,meal_cost:meal_cost,extra_bill:extra_bill,cost_sub_total:cost_sub_total,meal_advance_pay:meal_advance_pay,meal_due_pay:meal_due_pay,room_rent_pay:room_rent_pay,room_rent_due:room_rent_due,total_cost_cal:total_cost_cal,total_advance_cal:total_advance_cal,total_due_cal:total_due_cal,pay_to:pay_to,paidStatus:paidStatus},
                    success:function (result){
                        alert(result.message);
                    }
                })

            })
            $('#receiptMonth').on('change',function (){
                $('.border_btn').removeClass('disabled')
                var selectMonth = $(this).val();
                var border_id = {{$border->id}};
                $.ajax({
                    url:"/admin/border-pay-receipt/"+border_id+"/"+selectMonth,
                    data: {month:selectMonth,border_detail_id:border_id},
                    dataType:'json',
                    type:"get",
                    success: function (result){
                        $('.meal_count').html(result.total_meal)
                        $('.meal_count').val(result.total_meal)
                        $('.meal_rate').html("৳ "+parseFloat(result.meal_rate).toFixed(2))
                        $('.meal_rate').val(parseFloat(result.meal_rate).toFixed(2))
                        $('.room_rent').html("৳ "+result.month_rent)
                        $('.room_rent').val(result.month_rent)
                        $('.khala_bill').html("৳ "+500)
                        $('.khala_bill').val(500)
                        $('.meal_cost').html("৳ "+parseFloat(result.month_meal_cost).toFixed(2))
                        $('.meal_cost').val(parseFloat(result.month_meal_cost).toFixed(2))
                        $('.extra_bill').html("৳ "+result.extra_bill)
                        $('.extra_bill').val(result.extra_bill)
                        $('.cost_sub_total').html("৳ "+(parseFloat(result.month_rent)+500+parseFloat(result.month_meal_cost)+parseFloat(result.extra_bill)).toFixed(2))
                        $('.cost_sub_total').val((parseFloat(result.month_rent)+500+parseFloat(result.month_meal_cost)+parseFloat(result.extra_bill)).toFixed(2))
                        $('.meal_advance_pay').html("৳ "+result.meal_advance_pay)
                        $('.meal_advance_pay').val(result.meal_advance_pay)
                        $('.meal_due_pay').html("৳ "+result.meal_due_pay)
                        $('.meal_due_pay').val(result.meal_due_pay)
                        $('.room_rent_pay').html("৳ "+result.room_advance_pay)
                        $('.room_rent_pay').val(result.room_advance_pay)
                        $('.room_rent_due').html("৳ "+result.room_due_pay)
                        $('.room_rent_due').val(result.room_due_pay)
                        var total_costs =  (parseFloat(result.month_rent)+500+parseFloat(result.month_meal_cost)+parseFloat(result.extra_bill)+parseFloat(result.room_due_pay)).toFixed(2)
                        var advance = (Number.parseFloat(result.room_advance_pay)+Number.parseFloat(result.meal_advance_pay)).toFixed(2)
                        $('.total_cost_cal').html("৳ "+ total_costs)
                        $('.total_cost_cal').val(total_costs)
                        $('.total_advance_cal').html("৳ "+(Number.parseFloat(result.meal_advance_pay)+Number.parseFloat(result.room_advance_pay)).toFixed(2))
                        $('.total_advance_cal').val((Number.parseFloat(result.meal_advance_pay)+Number.parseFloat(result.room_advance_pay)).toFixed(2))
                        $('.total_due_cal').html("৳ "+parseFloat(total_costs>advance?total_costs-advance:0).toFixed(2))
                        $('.total_due_cal').val(parseFloat(total_costs>advance?total_costs-advance:0).toFixed(2))
                        $('.pay_to').html((total_costs>advance?"You need to pay : ৳ " + parseFloat(total_costs-advance).toFixed(2) : "Manager will pay : ৳ " + parseFloat(advance-total_costs).toFixed(2)))
                        $('.pay_to').val((total_costs>advance?"You need to pay : ৳ " + parseFloat(total_costs-advance).toFixed(2) : "Manager will pay : ৳ " + parseFloat(advance-total_costs).toFixed(2)))
                        $('.paidStatus').html(total_costs>advance?`<span class='badge bg-danger'>Unpaid</span>` : `<span class='badge bg-success'>Paid</span>` )
                        $('.paidStatus').val(total_costs>advance?"<span class='badge bg-danger'>Unpaid</span>" : "<span class='badge bg-success'>Paid</span>" )

                    }
                })
            })
        </script>

@endsection

