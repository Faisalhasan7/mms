<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\TotalBilling;
use Illuminate\Http\Request;

class TotalBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $billings = TotalBilling::latest()->get();
        return view('admin.total-bill.index',compact('billings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $staffs = Staff::latest()->get();
        return view('admin.total-bill.create',compact('staffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'staff_id' => 'required',
            'bill_name' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ],['staff_id.required'=> 'Please select Staff name First']);
        $bill = new TotalBilling();
        $bill->staff_id = $request->input('staff_id');
        $bill->bill_name = $request->input('bill_name');
        $bill->amount = $request->input('amount');
        $bill->year = $request->input('year');
        $bill->month = $request->input('month');
        $bill->date = $request->input('date');
        $bill->status = "Pending";
        $bill->save();

        $notification = array(
            'message' => 'Billing Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.total_bill')->with($notification);
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
        $bill = TotalBilling::findOrFail($id);
        return view('admin.total-bill.edit',compact('staffs','bill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $bill = TotalBilling::findOrFail($id);
        $bill->staff_id = $request->input('staff_id');
        $bill->bill_name = $request->input('bill_name');
        $bill->amount = $request->input('amount');
        $bill->year = $request->input('year');
        $bill->month = $request->input('month');
        $bill->date = $request->input('date');
        $bill->status = $request->input('status');
        $bill->update();

        $notification = array(
            'message' => 'Billing Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.total_bill')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $bill = TotalBilling::findOrFail($id);
        $bill->delete();

        $notification = array(
            'message' => 'Billing Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
