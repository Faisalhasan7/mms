@extends('admin.layouts.master')
@section('admin_content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Staff</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.staff_update',$staff->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="staff_name" class="form-label">Staff Name</label>
                                            <input type="text" class="form-control @error('staff_name') is-invalid @enderror" name="staff_name" value="{{$staff->staff_name}}">
                                            @error('staff_name')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="staff_designation" class="form-label">Staff Designation</label>
                                            <input type="text" class="form-control @error('staff_designation') is-invalid @enderror" name="staff_designation" value="{{$staff->staff_designation}}">
                                            @error('staff_designation')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="floor" class="form-label">Workable Floor</label>
                                            <input type="text" class="form-control @error('floor') is-invalid @enderror" name="floor" value="{{$staff->floor}}">
                                            @error('floor')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="salary" class="form-label">Salary</label>
                                            <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{$staff->salary}}">
                                            @error('salary')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="border_joining_date" class="form-label">Staff Joining Date</label>
                                                <input type="date" class="form-control @error('staff_joining_date') is-invalid @enderror" name="staff_joining_date" id="staff_joining_date" value="{{$staff->staff_joining_date}}">
                                                @error('staff_joining_date')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="flat_no" class="form-label">Flat No</label>
                                                <input type="text" class="form-control @error('flat_no') is-invalid @enderror" name="flat_no" id="flat_no" value="{{$staff->flat_no}}">
                                                @error('flat_no')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mobile" class="form-label">Mobile</label>
                                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="mobile" value="{{$staff->mobile}}">
                                                @error('mobile')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Staff Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$staff->email}}">
                                                @error('email')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="dob" class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="email" value="{{$staff->dob}}">
                                                @error('dob')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="blood_group" class="form-label">Staff Group</label>
                                                <input type="blood_group" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" id="blood_group" value="{{$staff->blood_group}}">
                                                @error('blood_group')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="facebook_account" class="form-label">Staff Facebook</label>
                                                <input type="text" class="form-control @error('facebook_account') is-invalid @enderror" name="facebook_account" id="facebook_account" value="{{$staff->facebook_account}}">
                                                @error('facebook_account')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="father_name" class="form-label">Staff Father's Name</label>
                                                <input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" id="father_name" value="{{$staff->father_name}}">
                                                @error('father_name')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="father_mobile" class="form-label">Staff Father's Mobile</label>
                                                <input type="text" class="form-control @error('father_mobile') is-invalid @enderror" name="father_mobile" id="father_mobile" value="{{$staff->father_mobile}}">
                                                @error('father_mobile')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="village" class="form-label">Staff's Village</label>
                                                <input type="text" class="form-control @error('village') is-invalid @enderror" name="village" id="village" value="{{$staff->village}}">
                                                @error('village')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="holding_no" class="form-label">Holding No</label>
                                                <input type="text" class="form-control @error('holding_no') is-invalid @enderror" name="holding_no" id="holding_no" value="{{$staff->holding_no}}">
                                                @error('holding_no')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="post" class="form-label">Post Office</label>
                                                <input type="text" class="form-control @error('post') is-invalid @enderror" name="post" id="post" value="{{$staff->post}}">
                                                @error('post')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="thana" class="form-label">Thana</label>
                                                <input type="text" class="form-control @error('thana') is-invalid @enderror" name="thana" id="thana" value="{{$staff->thana}}">
                                                @error('thana')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="district" class="form-label">District</label>
                                                <input type="text" class="form-control @error('district') is-invalid @enderror" name="district" id="district" value="{{$staff->district}}">
                                                @error('district')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nearest_relative_dhaka" class="form-label">Staff Nearest Relative in Dhaka</label>
                                                <input type="text" class="form-control @error('nearest_relative_dhaka') is-invalid @enderror" name="nearest_relative_dhaka" id="nearest_relative_dhaka" value="{{$staff->nearest_relative_dhaka}}">
                                                @error('nearest_relative_dhaka')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nearest_relative_mobile" class="form-label">Relative's Mobile</label>
                                                <input type="text" class="form-control @error('nearest_relative_mobile') is-invalid @enderror" name="nearest_relative_mobile" id="nearest_relative_mobile" value="{{$staff->nearest_relative_mobile}}">
                                                @error('nearest_relative_mobile')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nearest_relative_house_no" class="form-label">Relative's House</label>
                                                <input type="text" class="form-control @error('nearest_relative_house_no') is-invalid @enderror" name="nearest_relative_house_no" id="district" value="{{$staff->nearest_relative_house_no}}">
                                                @error('nearest_relative_house_no')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nearest_relative_road_no" class="form-label">Relative's Road No</label>
                                                <input type="text" class="form-control @error('nearest_relative_road_no') is-invalid @enderror" name="nearest_relative_road_no" id="district" value="{{$staff->nearest_relative_road_no}}">
                                                @error('nearest_relative_road_no')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nearest_relative_area" class="form-label">Relative's Area</label>
                                                <input type="text" class="form-control @error('nearest_relative_area') is-invalid @enderror" name="nearest_relative_area" id="nearest_relative_area" value="{{$staff->nearest_relative_area}}">
                                                @error('nearest_relative_area')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="organization_name" class="form-label">Organization Name</label>
                                                <input type="text" class="form-control @error('organization_name') is-invalid @enderror" name="organization_name" id="organization_name" value="{{$staff->organization_name}}">
                                                @error('organization_name')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="section" class="form-label">Section/Department</label>
                                                <input type="text" class="form-control @error('section') is-invalid @enderror" name="section" id="section" value="{{$staff->section}}">
                                                @error('section')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="subject" class="form-label">Subject</label>
                                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{$staff->subject}}">
                                                @error('subject')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="id_no" class="form-label">ID Number</label>
                                                <input type="text" class="form-control @error('id_no') is-invalid @enderror" name="id_no" id="id_no" value="{{$staff->id_no}}">
                                                @error('id_no')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="job_post" class="form-label">Designation</label>
                                                <input type="text" class="form-control @error('job_post') is-invalid @enderror" name="job_post" id="job_post" value="{{$staff->job_post}}">
                                                @error('job_post')
                                                <span class="text-danger fw-bold">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label for="rent" class="form-label">Rent Amount</label>--}}
{{--                                                <input type="text" class="form-control @error('rent') is-invalid @enderror" name="rent" id="rent" value="{{$border_detail->rent}}">--}}
{{--                                                @error('rent')--}}
{{--                                                <span class="text-danger fw-bold">{{$message}}</span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label for="advance" class="form-label">Advance Amount</label>--}}
{{--                                                <input type="text" class="form-control @error('advance') is-invalid @enderror" name="advance" id="advance" value="{{$border_detail->advance}}">--}}
{{--                                                @error('advance')--}}
{{--                                                <span class="text-danger fw-bold">{{$message}}</span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label for="service" class="form-label">Service Charge</label>--}}
{{--                                                <input type="text" class="form-control @error('service') is-invalid @enderror" name="service" id="service" value="{{$staff->service}}">--}}
{{--                                                @error('service')--}}
{{--                                                <span class="text-danger fw-bold">{{$message}}</span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nid_pic" class="form-label">National ID Card</label>
                                                <input type="file" id="nid" class="form-control @error('nid_pic') is-invalid @enderror" name="nid_pic">
                                            </div>
                                            <img id="showNID" src="{{$staff->nid_pic ? "/".$staff->nid_pic : asset('/backend/assets/no_image.jpg')}}" class="rounded-circle img-thumbnail avatar-lg" alt="National ID Card">
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="img" class="form-label">Picture</label>
                                                <input type="file" id="img" class="form-control" name="image">
                                            </div>
                                        <img id="showImg" src="{{$staff->image ? "/".$staff->image : asset('/backend/assets/no_image.jpg')}}" class="rounded-circle img-thumbnail avatar-lg" alt="profile-image">
                                        </div><!-- end col -->


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="isActive" class="form-label">Status</label>
                                            <select name="isActive" class="form-select @error('isActive') is-invalid @enderror" id="isActive">
                                                <option selected disabled >Select Status </option>
                                                <option {{$staff->isActive === '1' ? 'selected' :""}} value="1">Active</option>
                                                <option {{$staff->isActive === '0' ? 'selected' :""}} value="0">In Active</option>
                                            </select>
                                            @error('isActive')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>


                                    <div class="text-end">
                                        <button type="submit" class="btn btn-blue waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update</button>
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

