@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Border Details</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="border_name" class="form-label">Border Name</label>

                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->border_name}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="border_joining_date" class="form-label">Border Joining Date</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->border_joining_date}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="flat_no" class="form-label">Flat No</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->flat_no}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->mobile}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Border Email</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->email}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="facebook_account" class="form-label">Border Facebook</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->facebook_account}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="father_name" class="form-label">Border Father's Name</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->father_name}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="father_mobile" class="form-label">Border Father's Mobile</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->father_mobile}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="village" class="form-label">Border's Village</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->village}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="holding_no" class="form-label">Holding No</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->holding_no}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="post" class="form-label">Post Office</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->post}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="thana" class="form-label">Thana</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->thana}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="district" class="form-label">District</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->district}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nearest_relative_dhaka" class="form-label">Border Nearest Relative in Dhaka</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->nearest_relative_dhaka}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nearest_relative_mobile" class="form-label">Relative's Mobile</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->nearest_relative_mobile}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nearest_relative_house_no" class="form-label">Relative's House</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->nearest_relative_house_no}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nearest_relative_road_no" class="form-label">Relative's Road No</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->nearest_relative_road_no}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nearest_relative_area" class="form-label">Relative's Area</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->nearest_relative_area}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="organization_name" class="form-label">Organization Name</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->organization_name}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="section" class="form-label">Section/Department</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->section}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->subject}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="id_no" class="form-label">ID Number</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->id_no}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="job_post" class="form-label">Designation</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->job_post}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="rent" class="form-label">Rent Amount</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->rent}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="advance" class="form-label">Advance Amount</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->advance}}</p>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="service" class="form-label">Service Charge</label>
                                            <p class="fs-5 fw-bold text-blue">{{$border_detail->service}}</p>

                                        </div>
                                    </div>

                                    <img id="showImg" src="/{{$border_detail->image ? $border_detail->image : asset('backend/assets/no_image.jpg')}}" class="rounded-circle img-thumbnail avatar-lg" alt="profile-image">

                                </div> <!-- end row -->

                        </div>
                        <!-- end settings content-->
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->


    </div> <!-- container -->

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <canvas id="pieChart" width="300" height="300" ></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('pieChart').getContext('2d');
            var income = {{ $income }};
            var cost = {{ $cost }};

            var data = {
                labels: ['Income = ৳ '+income, 'Cost = ৳ '+cost],
                datasets: [{
                    data: [income, cost],
                    backgroundColor: ['#36A2EB', '#FFCE56'],
                }]
            };

            var pieChart = new Chart(ctx, {
                type: 'pie',
                data: data,
            });
        });
    </script>

@endsection

