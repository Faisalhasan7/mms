<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DailyProblem;
use Illuminate\Http\Request;

class DailyProblemController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:problem.list|problem.create|problem.edit|problem.delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:problem.list', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:problem.add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:problem.edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:problem.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $daily_problems = DailyProblem::latest()->get();
        return view('admin.daily-problem.index',compact('daily_problems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.daily-problem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'problem_name' => 'required'
        ]);
        $problem = new DailyProblem();
        $problem->problem_name = $request->input('problem_name');
        $problem->solution = $request->input('solution');
        $problem->year = $request->input('year');
        $problem->month = $request->input('month');
        $problem->date = $request->input('date');
        $problem->save();

        $notification = array(
            'message' => 'Daily Prbolem Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.daily_problem')->with($notification);
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
        $problem = DailyProblem::findOrFail($id);
        return view('admin.daily-problem.edit',compact('problem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $problem = DailyProblem::findOrFail($id);
        $problem->problem_name = $request->input('problem_name');
        $problem->solution = $request->input('solution');
        $problem->year = $request->input('year');
        $problem->month = $request->input('month');
        $problem->date = $request->input('date');
        $problem->update();

        $notification = array(
            'message' => 'Daily Problem Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.daily_problem')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $problem = DailyProblem::findOrFail($id);
        $problem->delete();

        $notification = array(
            'message' => 'Daily Problem Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
