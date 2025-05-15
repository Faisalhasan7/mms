<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BorderDetail;
use App\Models\TotalMeal;
use Illuminate\Http\Request;

class TotalMealController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:meal.list|meal.create|meal.edit|meal.delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:meal.list', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:meal.add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:meal.edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:meal.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $total_meals = TotalMeal::latest()->get();
        return view('admin.total-meal.index',compact('total_meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $border_details = BorderDetail::latest()->get();
        return view('admin.total-meal.create',compact('border_details'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'border_detail_id'=>'required',
            'date'=>'required',
            'breakfast'=>'required',
            'lunch'=>'required',
            'dinner'=>'required',
        ],['border_detail_id.required' => 'Select Border Name First']);
        $rent = new TotalMeal();
        $rent->border_detail_id = $request->input('border_detail_id');
        $rent->year = $request->input('year');
        $rent->month = $request->input('month');
        $rent->date = $request->input('date');
        $rent->breakfast = $request->input('breakfast');
        $rent->lunch = $request->input('lunch');
        $rent->dinner = $request->input('dinner');
        $rent->save();

        $notification = array(
            'message' => 'Meal Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.total_meal')->with($notification);
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
        $meal = TotalMeal::findOrFail($id);
        return view('admin.total-meal.edit',compact('border_details','meal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rent = TotalMeal::findOrFail($id);
        $rent->border_detail_id = $request->input('border_detail_id');
        $rent->year = $request->input('year');
        $rent->month = $request->input('month');
        $rent->date = $request->input('date');
        $rent->breakfast = $request->input('breakfast');
        $rent->lunch = $request->input('lunch');
        $rent->dinner = $request->input('dinner');
        $rent->update();

        $notification = array(
            'message' => 'Meal Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.total_meal')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $meal = TotalMeal::findOrFail($id);
        $meal->delete();

        $notification = array(
            'message' => 'Meal Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
