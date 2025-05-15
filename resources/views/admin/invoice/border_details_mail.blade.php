<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>MSJ - ASHIK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/backend/MSJ_2.png')}}">

    <!-- Plugins css -->
    <link href="{{asset('public/backend/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backend/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />

    <!-- third party css -->
    <link href="{{asset('public/backend/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backend/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backend/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backend/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- Bootstrap css -->
    <link href="{{asset('public/backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{asset('public/backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
    <!-- icons -->
    <link href="{{asset('public/backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Head js -->
    <script src="{{asset('public/backend/assets/js/head.js')}}"></script>
    <style>
        p{
            margin-bottom: 0.5rem;
        }
        table>tbody>tr>td{
            padding:0.5rem 0.5rem !important;
        }
    </style>
</head>

<!-- body start -->
<body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="dark" data-leftbar-size='default' data-sidebar-user='false'>


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
                                    <!--<div class="logo logo-dark">-->
                                    <!--    <span class="logo-lg">-->
                                    <!--        <img src="{{asset('public/backend/msj.jpeg')}}" alt="" height="80">-->
                                    <!--    </span>-->
                                    <!--</div>-->

                                    <div class="logo logo-light">
                                        <span class="logo-lg">
                                            <img src="{{asset('public/backend/msj.jpeg')}}" alt="" height="80">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <h4 class="m-0 d-print-none">Payment Receipt for {{$border['month']}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <div class="mt-1">
                                        <p class="d-flex justify-center"><strong>Border Name : </strong> <span class="float-end"> {{$border['border_detail']['border_name']}} &nbsp;&nbsp;&nbsp; </span></p>
                                        <p class="d-flex justify-center"><strong>Border Email : </strong> <span class="float-end">{{$border['border_detail']['email']}} &nbsp;&nbsp;&nbsp; </span></p>
                                        <p class="d-flex justify-center"><strong>Border Flat No : </strong> <span class="float-end">{{$border['border_detail']['flat_no']}} &nbsp;&nbsp;&nbsp; </span></p>
                                        <p class="d-flex justify-center"><strong>Border Phone : </strong> <span class="float-end">{{$border['border_detail']['mobile']}} &nbsp;&nbsp;&nbsp; </span></p>
                                    </div>

                                    <div class="mt-1 float-end mx-2">
                                        <p><strong>Receipt Date : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp; {{now()->format('d-M-Y -- H:i A')}}</span></p>
                                        <p><strong>Status : </strong> <span class="float-end">{!! $border["paidStatus"] !!}</span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->


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
                                                <td class="meal_count">{{$border['meal_count']}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    <b>Per Meal Rate</b> <br/>
                                                </td>
                                                <td class="meal_rate">৳ {{$border['meal_rate']}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>
                                                    <b>Room Rent</b> <br/>
                                                </td>
                                                <td class="room_rent">৳ {{$border['room_rent']}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>
                                                    <b>Khala Bill</b> <br/>
                                                </td>
                                                <td class="khala_bill">৳ {{$border['khala_bill']}}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>
                                                    <b>Total Meal Costs</b> <br/>
                                                </td>
                                                <td class="meal_cost">৳ {{$border['meal_cost']}}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>
                                                    <b>Extra Cost</b> <br/>
                                                </td>
                                                <td class="extra_bill">৳ {{$border['extra_bill']}}</td>
                                            </tr>


                                            <tr>
                                                <td colspan="3"><p class="float-end px-2"><b class="mx-2">Costs:</b> <span  class="cost_sub_total">৳ {{$border['cost_sub_total']}}</span></p></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>
                                                    <b>Meal Advance Pay</b> <br/>
                                                </td>
                                                <td class="meal_advance_pay">৳ {{$border['meal_advance_pay']}}</td>
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
                                                <td class="room_rent_pay">৳ {{$border['room_rent_pay']}}</td>
                                            </tr>

                                            <tr>
                                                <td>10</td>
                                                <td>
                                                    <b>Room Rent Due</b> <br/>
                                                </td>
                                                <td class="room_rent_due">৳ {{$border['room_rent_due']}}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive -->
                                    <div class="float-end mt-2">
                                        <p><b>Total Costs:</b> <span class="float-end total_cost_cal">৳ {{$border['total_cost_cal']}}</span></p>
                                        <p><b>Total Advance:</b> <span class="float-end total_advance_cal"> &nbsp;&nbsp;&nbsp; ৳ {{$border['total_advance_cal']}}</span></p>
                                        <p><b>Total Due:</b> <span class="float-end total_due_cal"> &nbsp;&nbsp;&nbsp; ৳ {{$border['total_due_cal']}}</span></p>
                                        <h4 class="text-danger pay_to">{{$border['pay_to']}}</h4>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                            <p class="text-center">Developed By: ASHIK. <a href="mailto:ashikurrahmanbpi72@gmail.com"><i class="fa fa-mail-bulk"></i> &nbsp;ashikurrahmanbpi72@gmail.com</a> <i class="fa fa-phone"></i>&nbsp;
                                <a href="tell:01907371151">01907371151</a>, <a href="tell:01792104772">01792104772</a></p>

                        </div>
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->
    </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6" data-bs-toggle='modal' data-bs-target='#exampleModal'>
                        <script>document.write(new Date().getFullYear())</script> &copy; Developed by <a href="https://www.facebook.com/iamashik194/">ASHIK</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-sm-block" style="cursor: pointer;" data-bs-toggle='modal' data-bs-target='#exampleModal'>
                            For More Software Click <a href="https://www.facebook.com/iamashik194/">ASHIK</a>
                        </div>
                    </div>
                </div>
            </div>




        </footer>



        <!-- Vendor js -->
        <script src="{{asset('public/backend/assets/js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{asset('public/backend/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{asset('public/backend/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{asset('public/backend/assets/js/pages/dashboard-1.init.js')}}"></script>

        <!-- App js-->
        <script src="{{asset('public/backend/assets/js/app.min.js')}}"></script>


        <!-- third party js -->
        <script src="{{asset('public/backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="{{asset('public/backend/assets/js/pages/datatables.init.js')}}"></script>

        <!-- Sparkline chart js -->
        <script src="{{asset('public/backend/assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Opportunities init js -->
        <script src="{{asset('public/backend/assets/js/pages/crm-opportunities.init.js')}}"></script>

        <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('ashik', {
                height: 150,
                baseFloatZIndex: 10005,
                removeButtons: 'PasteFromWord'
            });
        </script>


        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
            @endif
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>

            $(function(){
                $(document).on('click','#delete',function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");


                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Delete This Data?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })


                });

            });


        </script>

</body>
</html>
