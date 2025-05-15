<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BorderDetail;
use App\Models\MealCost;
use App\Models\TotalMeal;
use Illuminate\Http\Request;

class MealCostController extends Controller
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
        $meal_costs = MealCost::latest()->get();
        return view('admin.meal-cost.index',compact('meal_costs'));
    }

    /**
     * Display Monthly a listing of the resource.
     */
    public function mealMonths()
    {
        //
        $meal_costs = TotalMeal::where('year',date('Y'))->select('month')->groupBy('month')->get();
        return view('admin.meal-cost.mealMonths',compact('meal_costs'));
    }

    /**
     * Display Monthly a listing of the resource.
     */
    public function monthlyMeals(Request $request)
    {
        //
        $monthly = TotalMeal::where('month',$request->month)->select('date')->groupBy('date')->get();
        return view('admin.meal-cost.monthlyMeals',compact('monthly'));
    }

    /**
     * Display Daily a listing of the resource.
     */
    public function dailyMeals(Request $request)
    {
        //
        $total_meals = TotalMeal::where('date',$request->date)->latest()->get();
        return view('admin.meal-cost.dailyMeals',compact('total_meals'));
    }
    /**
     * Display Monthly a listing of the resource.
     */
        public function individualBorderMeals(Request $request)
        {
            //
            $monthly = TotalMeal::where('month',$request->month)
                ->select('border_detail_id')
                ->groupBy('border_detail_id')
                ->get();
            return view('admin.meal-cost.individualBorderMeals',compact('monthly'));
        }
    /**
     * Display Individual a listing of the resource.
     */
    public function individualMeals(string $month, string $border_detail_id)
    {
        //
        $total_meals = TotalMeal::where('month',$month)
            ->where('border_detail_id',$border_detail_id)
            ->latest()->get();
        return view('admin.meal-cost.individualMeals',compact('total_meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $border_details = BorderDetail::latest()->get();
        return view('admin.meal-cost.create',compact('border_details'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(['border_detail_id'=>'required'],['border_detail_id.required'=>'Please select border name first']);
        $meal = new MealCost();
        $meal->border_detail_id = $request->input('border_detail_id');
        $meal->cost = empty($request->input('cost'))?0:$request->input('cost');
        $meal->payment = empty($request->input('payment'))?0:$request->input('payment');
        $meal->advance = empty($request->input('advance'))?0:$request->input('advance');
        $meal->due = $request->cost>($request->payment + $request->advance) ? ($request->cost - ($request->payment + $request->advance)):0;
        $meal->year = $request->input('year');
        $meal->month = $request->input('month');
        $meal->date = $request->input('date');
        $meal->status = "Pending";
        $meal->save();

        $notification = array(
            'message' => 'Meal Cost Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.meal_cost')->with($notification);
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
        $meal = MealCost::findOrFail($id);
        return view('admin.meal-cost.edit',compact('border_details','meal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $meal = MealCost::findOrFail($id);
        $meal->border_detail_id = $request->input('border_detail_id');
        $meal->cost = empty($request->input('cost'))?0:$request->input('cost');
        $meal->payment = empty($request->input('payment'))?0:$request->input('payment');
        $meal->advance = empty($request->input('advance'))?0:$request->input('advance');
        $meal->due = $request->cost>($request->payment + $request->advance) ? ($request->cost - ($request->payment + $request->advance)):0;
        $meal->year = $request->input('year');
        $meal->month = $request->input('month');
        $meal->date = $request->input('date');
        $meal->status = $request->input('status');
        $meal->update();

        $notification = array(
            'message' => 'Meal Cost Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.meal_cost')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $meal = MealCost::findOrFail($id);
        $meal->delete();

        $notification = array(
            'message' => 'Meal Cost Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
