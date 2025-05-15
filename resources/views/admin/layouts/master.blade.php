<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>MMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('/backend/MMS.png')}}">

        <!-- Plugins css -->
        <link href="{{asset('/backend/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/backend/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />

        <!-- third party css -->
        <link href="{{asset('/backend/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/backend/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/backend/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/backend/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- Bootstrap css -->
        <link href="{{asset('/backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{asset('/backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
        <!-- icons -->
        <link href="{{asset('/backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Head js -->
        <script src="{{asset('/backend/assets/js/head.js')}}"></script>

    </head>

    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="dark" data-leftbar-size='default' data-sidebar-user='false'>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->
            @include('admin.layouts.header')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->
            @include('admin.layouts.sidebar')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    @yield('admin_content')


                </div> <!-- content -->

                <!-- Footer Start -->
                @include('admin.layouts.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{asset('/backend/assets/js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{asset('/backend/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{asset('/backend/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{asset('/backend/assets/js/pages/dashboard-1.init.js')}}"></script>

        <!-- App js-->
        <script src="{{asset('/backend/assets/js/app.min.js')}}"></script>


        <!-- third party js -->
        <script src="{{asset('/backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('/backend/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="{{asset('/backend/assets/js/pages/datatables.init.js')}}"></script>

        <!-- Sparkline chart js -->
        <script src="{{asset('/backend/assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Opportunities init js -->
        <script src="{{asset('/backend/assets/js/pages/crm-opportunities.init.js')}}"></script>

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
