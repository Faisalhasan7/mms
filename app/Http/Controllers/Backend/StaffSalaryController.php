<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\StaffSalary;
use Illuminate\Http\Request;

class StaffSalaryController extends Controller
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
        $staff_salaries = StaffSalary::latest()->get();
        return view('admin.staff.salaries',compact('staff_salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $staffs = Staff::latest()->get();
        return view('admin.staff.salary-create',compact('staffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'staff_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ],['staff_id.required'=>'Please select Staff Name first']);
        $staff = Staff::findOrFail($request->staff_id)->first();
        $staff_salary = new StaffSalary();
        $staff_salary->staff_id = $request->input('staff_id');
        $staff_salary->year = $request->input('year');
        $staff_salary->month = $request->input('month');
        $staff_salary->date = $request->input('date');
        $staff_salary->amount = $request->input('amount');
        $staff_salary->due = $request->amount < $staff->salary ? ($staff->salary- $request->amount) : 0;
        $staff_salary->save();

        $notification = array(
            'message' => 'Staff Salary Paid Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.staff_salary')->with($notification);
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
        $staffs = Staff::latest()->get();
        $staff_salary = StaffSalary::findOrFail($id);
        return view('admin.staff.salary-edit',compact('staffs','staff_salary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $staff = Staff::findOrFail($request->staff_id)->first();
        $staff_salary = StaffSalary::findOrFail($id);
        $staff_salary->staff_id = $request->input('staff_id');
        $staff_salary->year = $request->input('year');
        $staff_salary->month = $request->input('month');
        $staff_salary->date = $request->input('date');
        $staff_salary->amount = $request->input('amount');
        $staff_salary->due = $request->amount < $staff->salary ? ($staff->salary- $request->amount) : 0;
        $staff_salary->update();

        $notification = array(
            'message' => 'Staff Salary Paid Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.staff_salary')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $staff_salary = StaffSalary::findOrFail($id);
        $staff_salary->delete();

        $notification = array(
            'message' => 'Staff Salary Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
