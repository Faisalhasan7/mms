@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Border Details Update</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.border_details_update',$border_detail->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="border_name" class="form-label">Border Name</label>
                                            <input type="text" class="form-control @error('border_name') is-invalid @enderror" name="border_name" id="border_name" value="{{$border_detail->border_name}}">
                                            @error('border_name')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="border_joining_date" class="form-label">Border Joining Date</label>
                                            <input type="date" class="form-control @error('border_joining_date') is-invalid @enderror" name="border_joining_date" id="border_joining_date" value="{{$border_detail->border_joining_date}}">
                                            @error('border_joining_date')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="flat_no" class="form-label">Flat No</label>
                                            <input type="text" class="form-control @error('flat_no') is-invalid @enderror" name="flat_no" id="flat_no" value="{{$border_detail->flat_no}}">
                                            @error('flat_no')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile</label>
                                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="mobile" value="{{$border_detail->mobile}}">
                                            @error('mobile')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Border Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$border_detail->email}}">
                                            @error('email')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="email" value="{{$border_detail->dob}}">
                                            @error('dob')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="blood_group" class="form-label">Blood Group</label>
                                            <input type="blood_group" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" id="blood_group" value="{{$border_detail->blood_group}}">
                                            @error('blood_group')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="facebook_account" class="form-label">Border Facebook</label>
                                            <input type="text" class="form-control @error('facebook_account') is-invalid @enderror" name="facebook_account" id="facebook_account" value="{{$border_detail->facebook_account}}">
                                            @error('facebook_account')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="father_name" class="form-label">Border Father's Name</label>
                                            <input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" id="father_name" value="{{$border_detail->father_name}}">
                                            @error('father_name')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="father_mobile" class="form-label">Border Father's Mobile</label>
                                            <input type="text" class="form-control @error('father_mobile') is-invalid @enderror" name="father_mobile" id="father_mobile" value="{{$border_detail->father_mobile}}">
                                            @error('father_mobile')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="village" class="form-label">Border's Village</label>
                                            <input type="text" class="form-control @error('village') is-invalid @enderror" name="village" id="village" value="{{$border_detail->village}}">
                                            @error('village')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="holding_no" class="form-label">Holding No</label>
                                            <input type="text" class="form-control @error('holding_no') is-invalid @enderror" name="holding_no" id="holding_no" value="{{$border_detail->holding_no}}">
                                            @error('holding_no')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="post" class="form-label">Post Office</label>
                                            <input type="text" class="form-control @error('post') is-invalid @enderror" name="post" id="post" value="{{$border_detail->post}}">
                                            @error('post')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="thana" class="form-label">Thana</label>
                                            <input type="text" class="form-control @error('thana') is-invalid @enderror" name="thana" id="thana" value="{{$border_detail->thana}}">
                                            @error('thana')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="district" class="form-label">District</label>
                                            <input type="text" class="form-control @error('district') is-invalid @enderror" name="district" id="district" value="{{$border_detail->district}}">
                                            @error('district')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nearest_relative_dhaka" class="form-label">Border Nearest Relative in Dhaka</label>
                                            <input type="text" class="form-control @error('nearest_relative_dhaka') is-invalid @enderror" name="nearest_relative_dhaka" id="nearest_relative_dhaka" value="{{$border_detail->nearest_relative_dhaka}}">
                                            @error('nearest_relative_dhaka')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nearest_relative_mobile" class="form-label">Relative's Mobile</label>
                                            <input type="text" class="form-control @error('nearest_relative_mobile') is-invalid @enderror" name="nearest_relative_mobile" id="nearest_relative_mobile" value="{{$border_detail->nearest_relative_mobile}}">
                                            @error('nearest_relative_mobile')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nearest_relative_house_no" class="form-label">Relative's House</label>
                                            <input type="text" class="form-control @error('nearest_relative_house_no') is-invalid @enderror" name="nearest_relative_house_no" id="district" value="{{$border_detail->nearest_relative_house_no}}">
                                            @error('nearest_relative_house_no')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nearest_relative_road_no" class="form-label">Relative's Road No</label>
                                            <input type="text" class="form-control @error('nearest_relative_road_no') is-invalid @enderror" name="nearest_relative_road_no" id="district" value="{{$border_detail->nearest_relative_road_no}}">
                                            @error('nearest_relative_road_no')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nearest_relative_area" class="form-label">Relative's Area</label>
                                            <input type="text" class="form-control @error('nearest_relative_area') is-invalid @enderror" name="nearest_relative_area" id="nearest_relative_area" value="{{$border_detail->nearest_relative_area}}">
                                            @error('nearest_relative_area')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="organization_name" class="form-label">Organization Name</label>
                                            <input type="text" class="form-control @error('organization_name') is-invalid @enderror" name="organization_name" id="organization_name" value="{{$border_detail->organization_name}}">
                                            @error('organization_name')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="section" class="form-label">Section/Department</label>
                                            <input type="text" class="form-control @error('section') is-invalid @enderror" name="section" id="section" value="{{$border_detail->section}}">
                                            @error('section')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{$border_detail->subject}}">
                                            @error('subject')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="id_no" class="form-label">ID Number</label>
                                            <input type="text" class="form-control @error('id_no') is-invalid @enderror" name="id_no" id="id_no" value="{{$border_detail->id_no}}">
                                            @error('id_no')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="job_post" class="form-label">Designation</label>
                                            <input type="text" class="form-control @error('job_post') is-invalid @enderror" name="job_post" id="job_post" value="{{$border_detail->job_post}}">
                                            @error('job_post')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="rent" class="form-label">Rent Amount</label>
                                            <input type="text" class="form-control @error('rent') is-invalid @enderror" name="rent" id="rent" value="{{$border_detail->rent}}">
                                            @error('rent')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="advance" class="form-label">Advance Amount</label>
                                            <input type="text" class="form-control @error('advance') is-invalid @enderror" name="advance" id="advance" value="{{$border_detail->advance}}">
                                            @error('advance')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="service" class="form-label">Service Charge</label>
                                            <input type="text" class="form-control @error('service') is-invalid @enderror" name="service" id="service" value="{{$border_detail->service}}">
                                            @error('service')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nid_pic" class="form-label">National ID Card</label>
                                            <input type="file" id="nid" class="form-control @error('nid_pic') is-invalid @enderror" name="nid_pic">
                                        </div>
                                        <img id="showNID" src="{{$border_detail->nid_pic?"/".$border_detail->nid_pic : asset('/backend/assets/no_image.jpg')}}" class="rounded-circle img-thumbnail avatar-lg" alt="National ID Card">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="img" class="form-label">Picture</label>
                                            <input type="file" id="img" class="form-control" name="image">
                                        </div>
                                        <img id="showImg" src="{{$border_detail->image ?"/".$border_detail->image : asset('/backend/assets/no_image.jpg')}}" class="rounded-circle img-thumbnail avatar-lg" alt="profile-image">
                                    </div><!-- end col -->
                                    

                                </div> <!-- end row -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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

            $("#nid").change(function (e){
                var readerNID = new FileReader();
                readerNID.onload = function (e){
                    $("#showNID").attr('src',e.target.result);
                }
                readerNID.readAsDataURL(e.target.files['0']);
            })

        });
    </script>


@endsection

