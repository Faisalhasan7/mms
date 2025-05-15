<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bazar;
use App\Models\Staff;
use Illuminate\Http\Request;

class BazarController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:bazar.list|bazar.create|bazar.edit|bazar.delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:bazar.list', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:bazar.add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:bazar.edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:bazar.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bazars = Bazar::latest()->get();
        return view('admin.bazar.index',compact('bazars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $staffs = Staff::all();
        return view('admin.bazar.create',compact('staffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'staff_id'      => 'required',
            'bazar_date'    => 'required',
            'bazar_amount'  => 'required',
            'bazar_list'    => 'required',
        ],[
            'staff_id.required'     => 'First select Staff name',
            'bazar_date.required'   => 'Please select Bazar Date',
            'bazar_amount.required' => 'Enter Bazar Amount',
            'bazar_list.required'   => 'Bazar List is also needed',
        ]);
        $bazar                  = new Bazar();
        $bazar->staff_id        = $request->input('staff_id');
        $bazar->year            = $request->input('year');
        $bazar->month           = $request->input('month');
        $bazar->bazar_date      = $request->input('bazar_date');
        $bazar->bazar_amount    = $request->input('bazar_amount');
        $bazar->bazar_list      = $request->input('bazar_list');
        $bazar->comments        = $request->input('comments');
        $bazar->status          = "Pending";
        $bazar->save();

        $notification = array(
            'message'       => 'Bazar List Added Successfully',
            'alert-type'    => 'success'
        );

        return redirect()->route('admin.total_bazar')->with($notification);
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
        $staffs = Staff::all();
        $bazar = Bazar::findOrFail($id);
        return view('admin.bazar.edit',compact('staffs','bazar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $bazar                  = Bazar::findOrFail($id);
        $bazar->staff_id        = $request->input('staff_id');
        $bazar->year            = $request->input('year');
        $bazar->month           = $request->input('month');
        $bazar->bazar_date      = $request->input('bazar_date');
        $bazar->bazar_amount    = $request->input('bazar_amount');
        $bazar->bazar_list      = $request->input('bazar_list');
        $bazar->comments        = $request->input('comments');
        $bazar->status          = $request->input('status');
        $bazar->update();

        $notification = array(
            'message' => 'Bazar List Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.total_bazar')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $bazar = Bazar::findOrFail($id);
        $bazar->delete();

        $notification = array(
            'message' => 'Bazar List Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
