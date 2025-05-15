<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StaffController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:staff.list|staff.create|staff.edit|staff.delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:staff.list', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:staff.add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:staff.edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:staff.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $staffs = Staff::latest()->get();
        return view('admin.staff.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'staff_name' => 'required',
            'staff_designation' => 'required',
            'floor' => 'required',
            'salary' => 'required',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//            'mobile' => 'required|string|regex:/^(\+?\d{1,3}[-\s]?)?\(?\d{2,3}\)?[-\s]?\d{3}[-\s]?\d{4}$/',
            'mobile' => 'required',
            'email' => 'required|email|max:255',
            'father_name' => 'required|string|max:255',
            'father_mobile' => 'required',
            'village' => 'required|string|max:255',
            'post' => 'required|string|max:255',
            'thana' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'isActive' => 'required',
        ]);
        $staff = new Staff();
        $staff->staff_name = $request->input('staff_name');
        $staff->staff_designation = $request->input('staff_designation');
        $staff->floor = $request->input('floor');
        $staff->salary = $request->input('salary');
        $staff->isActive = $request->input('isActive');
        $staff->staff_joining_date = $request->input('staff_joining_date');
        $staff->mobile = $request->input('mobile');
        $staff->email = $request->input('email');
        $staff->flat_no = $request->input('flat_no');
        $staff->facebook_account = $request->input('facebook_account');
        $staff->father_name = $request->input('father_name');
        $staff->father_mobile = $request->input('father_mobile');
        $staff->village = $request->input('village');
        $staff->holding_no = $request->input('holding_no');
        $staff->post = $request->input('post');
        $staff->thana = $request->input('thana');
        $staff->district = $request->input('district');
        $staff->dob = $request->input('dob');
        $staff->blood_group = $request->input('blood_group');
        $staff->nearest_relative_dhaka = $request->input('nearest_relative_dhaka');
        $staff->nearest_relative_mobile = $request->input('nearest_relative_mobile');
        $staff->nearest_relative_house_no = $request->input('nearest_relative_house_no');
        $staff->nearest_relative_road_no = $request->input('nearest_relative_road_no');
        $staff->nearest_relative_area = $request->input('nearest_relative_area');
        $staff->organization_name = $request->input('organization_name');
        $staff->section = $request->input('section');
        $staff->subject = $request->input('subject');
        $staff->id_no = $request->input('id_no');
        $staff->job_post = $request->input('job_post');
        $staff->rent = $request->input('rent');
        $staff->advance = $request->input('advance');
        $staff->service = $request->input('service');

        if($request->hasFile('image')){
            $img = $request->file('image');
            $imgname = hexdec(uniqid()).'-'.$staff->staff_name.'-.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save('backend/assets/images/staff'.$imgname);
            $staff->image = 'backend/assets/images/staff'.$imgname;
        }

        if($request->hasFile('nid_pic')){
            $img = $request->file('nid_pic');
            $imgname = hexdec(uniqid()).'-'.$staff->staff_name.'-.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save('backend/assets/images/staff/nid'.$imgname);
            $staff->nid_pic = 'backend/assets/images/staff/nid'.$imgname;
        }

        $staff->save();

        $notification = array(
            'message' => 'Staff Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.staff')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $staff = Staff::findOrFail($id);
        return view('admin.staff.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $staff = Staff::findOrFail($id);
        $staff->staff_name = $request->input('staff_name');
        $staff->staff_designation = $request->input('staff_designation');
        $staff->floor = $request->input('floor');
        $staff->salary = $request->input('salary');
        $staff->isActive = $request->input('isActive');
        $staff->staff_joining_date = $request->input('staff_joining_date');
        $staff->mobile = $request->input('mobile');
        $staff->email = $request->input('email');
        $staff->flat_no = $request->input('flat_no');
        $staff->facebook_account = $request->input('facebook_account');
        $staff->father_name = $request->input('father_name');
        $staff->father_mobile = $request->input('father_mobile');
        $staff->village = $request->input('village');
        $staff->holding_no = $request->input('holding_no');
        $staff->post = $request->input('post');
        $staff->thana = $request->input('thana');
        $staff->district = $request->input('district');
        $staff->dob = $request->input('dob');
        $staff->blood_group = $request->input('blood_group');
        $staff->nearest_relative_dhaka = $request->input('nearest_relative_dhaka');
        $staff->nearest_relative_mobile = $request->input('nearest_relative_mobile');
        $staff->nearest_relative_house_no = $request->input('nearest_relative_house_no');
        $staff->nearest_relative_road_no = $request->input('nearest_relative_road_no');
        $staff->nearest_relative_area = $request->input('nearest_relative_area');
        $staff->organization_name = $request->input('organization_name');
        $staff->section = $request->input('section');
        $staff->subject = $request->input('subject');
        $staff->id_no = $request->input('id_no');
        $staff->job_post = $request->input('job_post');
        $staff->rent = $request->input('rent');
        $staff->advance = $request->input('advance');
        $staff->service = $request->input('service');

        if($request->hasFile('image')){
            $img = $request->file('image');
            if($staff->image){
                unlink($staff->image);
            }
            $imgname = hexdec(uniqid()).'-'.$staff->border_name.'-.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save('backend/assets/images/staff'.$imgname);
            $staff->image = 'backend/assets/images/staff'.$imgname;
        }

        if($request->hasFile('nid_pic')){
            $img = $request->file('nid_pic');
            if($staff->nid_pic){
                unlink($staff->nid_pic);
            }
            $imgname = hexdec(uniqid()).'-'.$staff->border_name.'-.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save('backend/assets/images/staff/nid'.$imgname);
            $staff->nid_pic = 'backend/assets/images/staff/nid'.$imgname;
        }
        $staff->update();

        $notification = array(
            'message' => 'Staff Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.staff')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $staff = Staff::findOrFail($id);
        $staff->delete();

        $notification = array(
            'message' => 'Staff Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
