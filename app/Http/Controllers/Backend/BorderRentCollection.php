<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BorderDetail;
use App\Models\BorderRentCellection;
use Illuminate\Http\Request;

class BorderRentCollection extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:rent.list|rent.create|rent.edit|rent.delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:rent.list', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:rent.add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:rent.edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:rent.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $border_rents = BorderRentCellection::latest()->get();
        return view('admin.border-rents.index',compact('border_rents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $border_details = BorderDetail::latest()->get();
        return view('admin.border-rents.create',compact('border_details'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'border_detail_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ],[
            'border_detail_id.required' => 'Please select Border Name first'
        ]);
        $border_detail = BorderDetail::findOrFail($request->border_detail_id)->first();
        $rent = new BorderRentCellection();
        $rent->border_detail_id = $request->input('border_detail_id');
        $rent->year = $request->input('year');
        $rent->month = $request->input('month');
        $rent->date = $request->input('date');
        $rent->amount = $request->input('amount');
        $rent->due = $request->amount <= $border_detail->rent ? ($border_detail->rent - $request->amount) : 0;
        $rent->status = "Pending";
        $rent->save();

        $notification = array(
            'message' => 'Border Rent Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.border_rent')->with($notification);
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
        $border_details = BorderDetail::latest()->get();
        $rent = BorderRentCellection::findOrFail($id);
        return view('admin.border-rents.edit',compact('border_details','rent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $border_detail = BorderDetail::where('id',$request->border_detail_id)->first();
        $rent = BorderRentCellection::findOrFail($id);
        $rent->border_detail_id = $request->input('border_detail_id');
        $rent->year = $request->input('year');
        $rent->month = $request->input('month');
        $rent->date = $request->input('date');
        $rent->amount = $request->input('amount');
        $rent->due = $request->amount <= $border_detail->rent ? ($border_detail->rent - $request->amount) : 0;
        $rent->status = $request->input('status');
        $rent->update();

        $notification = array(
            'message' => 'Border Rent Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.border_rent')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $rent = BorderRentCellection::findOrFail($id);
        $rent->delete();

        $notification = array(
            'message' => 'Border Rent Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
