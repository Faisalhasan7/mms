<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BorderDetailRequest;
use App\Mail\BorderDetailsMail;
use App\Models\Bazar;
use App\Models\BorderDetail;
use App\Models\BorderRentCellection;
use App\Models\MealCost;
use App\Models\ProductBuy;
use App\Models\StaffSalary;
use App\Models\TotalBilling;
use App\Models\TotalMeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class BorderDetailController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:border.list|border.create|border.edit|border.delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:border.list', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:border.add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:border.edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:border.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $border_details = BorderDetail::latest()->get();
        return view('admin.border-details.index',compact('border_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.border-details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BorderDetailRequest $request)
    {
        try{
            $border_deatail                             = new BorderDetail();
            $border_deatail->border_name                = $request->input('border_name');
            $border_deatail->border_joining_date        = $request->input('border_joining_date');
            $border_deatail->mobile                     = $request->input('mobile');
            $border_deatail->email                      = $request->input('email');
            $border_deatail->flat_no                    = $request->input('flat_no');
            $border_deatail->facebook_account           = $request->input('facebook_account');
            $border_deatail->father_name                = $request->input('father_name');
            $border_deatail->father_mobile              = $request->input('father_mobile');
            $border_deatail->village                    = $request->input('village');
            $border_deatail->holding_no                 = $request->input('holding_no');
            $border_deatail->post                       = $request->input('post');
            $border_deatail->thana                      = $request->input('thana');
            $border_deatail->district                   = $request->input('district');
            $border_deatail->dob                        = $request->input('dob');
            $border_deatail->blood_group                = $request->input('blood_group');
            $border_deatail->nearest_relative_dhaka     = $request->input('nearest_relative_dhaka');
            $border_deatail->nearest_relative_mobile    = $request->input('nearest_relative_mobile');
            $border_deatail->nearest_relative_house_no  = $request->input('nearest_relative_house_no');
            $border_deatail->nearest_relative_road_no   = $request->input('nearest_relative_road_no');
            $border_deatail->nearest_relative_area      = $request->input('nearest_relative_area');
            $border_deatail->organization_name          = $request->input('organization_name');
            $border_deatail->section                    = $request->input('section');
            $border_deatail->subject                    = $request->input('subject');
            $border_deatail->id_no                      = $request->input('id_no');
            $border_deatail->job_post                   = $request->input('job_post');
            $border_deatail->rent                       = $request->input('rent');
            $border_deatail->advance                    = $request->input('advance');
            $border_deatail->service                    = $request->input('service');
            if($request->hasFile('image')){
                $img = $request->file('image');
                $imgname = hexdec(uniqid()).'-'.$border_deatail->border_name.'-.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(300,300)->save('backend/assets/images/borders'.$imgname);
                $border_deatail->image = 'backend/assets/images/borders'.$imgname;
            }
            if($request->hasFile('nid_pic')){
                $img = $request->file('nid_pic');
                $imgname = hexdec(uniqid()).'-'.$border_deatail->border_name.'-.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(300,300)->save('backend/assets/images/borders/nid'.$imgname);
                $border_deatail->nid_pic = 'backend/assets/images/borders/nid'.$imgname;
            }
            $border_deatail->save();
            $notification = array(
                'message' => 'Border Created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.border_details')->with($notification);
        }catch(\Exception $e) {
            return redirect()->back()->withErrors("Error Occured");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $border_detail = BorderDetail::findOrFail($id);
        $income=8000; $cost=6000;
        return view('admin.border-details.show',compact('border_detail','income','cost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $border_detail = BorderDetail::findOrFail($id);
        return view('admin.border-details.edit',compact('border_detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $border_deatail = BorderDetail::findOrFail($id);
        $border_deatail->border_name = $request->input('border_name');
        $border_deatail->border_joining_date = $request->input('border_joining_date');
        $border_deatail->mobile = $request->input('mobile');
        $border_deatail->email = $request->input('email');
        $border_deatail->flat_no = $request->input('flat_no');
        $border_deatail->facebook_account = $request->input('facebook_account');
        $border_deatail->father_name = $request->input('father_name');
        $border_deatail->father_mobile = $request->input('father_mobile');
        $border_deatail->village = $request->input('village');
        $border_deatail->holding_no = $request->input('holding_no');
        $border_deatail->post = $request->input('post');
        $border_deatail->thana = $request->input('thana');
        $border_deatail->district = $request->input('district');
        $border_deatail->dob = $request->input('dob');
        $border_deatail->blood_group = $request->input('blood_group');
        $border_deatail->nearest_relative_dhaka = $request->input('nearest_relative_dhaka');
        $border_deatail->nearest_relative_mobile = $request->input('nearest_relative_mobile');
        $border_deatail->nearest_relative_house_no = $request->input('nearest_relative_house_no');
        $border_deatail->nearest_relative_road_no = $request->input('nearest_relative_road_no');
        $border_deatail->nearest_relative_area = $request->input('nearest_relative_area');
        $border_deatail->organization_name = $request->input('organization_name');
        $border_deatail->section = $request->input('section');
        $border_deatail->subject = $request->input('subject');
        $border_deatail->id_no = $request->input('id_no');
        $border_deatail->job_post = $request->input('job_post');
        $border_deatail->rent = $request->input('rent');
        $border_deatail->advance = $request->input('advance');
        $border_deatail->service = $request->input('service');

        if($request->hasFile('image')){
            $img = $request->file('image');
            if($border_deatail->image){
                unlink($border_deatail->image);
            }
            $imgname = hexdec(uniqid()).'-'.$border_deatail->border_name.'-.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save('backend/assets/images/borders'.$imgname);
            $border_deatail->image = 'backend/assets/images/borders'.$imgname;
        }

        if($request->hasFile('nid_pic')){
            $img = $request->file('nid_pic');
            if($border_deatail->nid_pic){
                unlink($border_deatail->nid_pic);
            }
            $imgname = hexdec(uniqid()).'-'.$border_deatail->border_name.'-.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save('backend/assets/images/borders/nid'.$imgname);
            $border_deatail->image = 'backend/assets/images/borders/nid'.$imgname;
        }

        $border_deatail->update();

        $notification = array(
            'message' => 'Border Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.border_details')->with($notification);
    }

    public function payment_receipt(string $id){

//        $data['monthly_borders'] = BorderDetail::whereMonth('created_at', date('m'));
        //=====Costs=====
//        $data['monthly_products'] = ProductBuy::whereMonth('date', date('m'));
//        $data['monthly_staffs'] = StaffSalary::whereMonth('date', date('m'));
        $data['monthly_billings'] = TotalBilling::whereMonth('date', date('m'));

        $border = BorderDetail::findOrFail($id);
        return view('admin.invoice.border-pay-receipt',compact('border'));
    }


    public function month_payment_receipt(Request $request, $border_detail_id, $month){
        $month_select = "";
        switch ($month){
            case "01":
                $month_select = "January";
                break;
            case "02":
                $month_select = "February";
                break;
            case "03":
                $month_select = "March";
                break;
            case "04":
                $month_select = "April";
                break;
            case "05":
                $month_select = "May";
                break;
            case "06":
                $month_select = "June";
                break;
            case "07":
                $month_select = "July";
                break;
            case "08":
                $month_select = "August";
                break;
            case "09":
                $month_select = "September";
                break;
            case "10":
                $month_select = "October";
                break;
            case "11":
                $month_select = "November";
                break;
            case "12":
                $month_select = "December";
                break;
        }
        $meal = TotalMeal::where('border_detail_id',$border_detail_id)->whereMonth('date',$month);
        $total_meal = $meal->count('breakfast') + $meal->count('lunch') + $meal->count('dinner');
        $border = BorderDetail::findOrFail($border_detail_id);
        $border_flat = BorderDetail::where('flat_no',$border->flat_no)->count();
        $monthly_border_rents = BorderRentCellection::where('border_detail_id',$border_detail_id)->where('month', $month_select);
        $meal_costs = MealCost::where('border_detail_id',$border_detail_id)->where('month', $month_select);
//                            $meal_payments = $meal_costs->sum('payment') + $meal_costs->sum('advance');
        $extra_bills = ProductBuy::where('flat_no',$border->flat_no)->where('month', $month_select)->where('status','Approved');
        $meal_month = TotalMeal::where('month',$month_select);
        $monthly_meal = $meal_month->sum('breakfast')+$meal_month->sum('lunch')+$meal_month->sum('dinner');
        $monthly_bazars = Bazar::where('month',$month_select)->where('status','Approved');

        $meal_rate = $monthly_bazars->sum('bazar_amount') / $monthly_meal;
        $month_meal_cost = $meal_rate * $total_meal;

        return response()->json([
            'total_meal' => $total_meal,
            'meal_rate' => $meal_rate,
            'month_rent' => $border->rent,
            'month_meal_cost' => $month_meal_cost,
            'meal_advance_pay' => $meal_costs->sum('advance'),
            'meal_due_pay' => $meal_costs->sum('due'),
//            'meal_payment' => $meal_costs->sum('payment'),
            //==========Costs============
//            'meal_costs' => $meal_costs->sum('cost'),
            'extra_bill' => $extra_bills->sum('sub_total')/$border_flat,
            'room_advance_pay' => $monthly_border_rents->sum('amount'),
            'room_due_pay' => $monthly_border_rents->sum('due'),
        ]);
    }

    public function month_mail_receipt(Request $request,$border_id, $month){
        $border = array();
        $month_select = "";
        switch ($month){
            case "01":
                $month_select = "January";
                break;
            case "02":
                $month_select = "February";
                break;
            case "03":
                $month_select = "March";
                break;
            case "04":
                $month_select = "April";
                break;
            case "05":
                $month_select = "May";
                break;
            case "06":
                $month_select = "June";
                break;
            case "07":
                $month_select = "July";
                break;
            case "08":
                $month_select = "August";
                break;
            case "09":
                $month_select = "September";
                break;
            case "10":
                $month_select = "October";
                break;
            case "11":
                $month_select = "November";
                break;
            case "12":
                $month_select = "December";
                break;
        }
        $border_detail = BorderDetail::select('border_name','email','flat_no','mobile')->whereId($border_id)->first();
        $border["month"]=$month_select;
        $border['border_detail'] = $border_detail;
        $border["meal_rate"]=$request->meal_rate;
        $border["room_rent"]=$request->room_rent;
        $border["meal_count"]=$request->meal_count;
        $border["khala_bill"]=$request->khala_bill;
        $border["meal_cost"]=$request->meal_cost;
        $border["extra_bill"]=$request->extra_bill;
        $border["cost_sub_total"]=$request->cost_sub_total;
        $border["meal_advance_pay"]=$request->meal_advance_pay;
        $border["meal_due_pay"]=$request->meal_due_pay;
        $border["room_rent_pay"]=$request->room_rent_pay;
        $border["room_rent_due"]=$request->room_rent_due;
        $border["total_cost_cal"]=$request->total_cost_cal;
        $border["total_advance_cal"]=$request->total_advance_cal;
        $border["total_due_cal"]=$request->total_due_cal;
        $border["pay_to"]=$request->pay_to;
        $border["paidStatus"]=$request->paidStatus;


        Mail::to($border_detail['email'])->send(new BorderDetailsMail($border));

        return response()->json([
            'status' => 200,
            'message' => "Email Send Successfully...!!!"
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $border_detail = BorderDetail::findOrFail($id);
        if($border_detail->image){
            unlink($border_detail->image);
        }
        if($border_detail->nid_pic){
            unlink($border_detail->nid_pic);
        }
        $border_detail->delete();

        $notification = array(
            'message' => 'Border Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function meal_rate_calculate($month){
        $month = TotalMeal::where('month',date('F'));
        $total_meal = $month->sum('breakfast')+$month->sum('lunch')+$month->sum('dinner');

        $monthly_borders = BorderDetail::whereMonth('created_at',date('m'));
        $monthly_border_rents = BorderRentCellection::where('date',date('m'));

        $monthly_meal_costs = MealCost::whereMonth('date',date('m'));
        //=====Costs=====
        $monthly_products = ProductBuy::whereMonth('date',date('m'))->where('status','Approved');
        $monthly_staffs = StaffSalary::whereMonth('date',date('m'));
        $monthly_billings = TotalBilling::whereMonth('date',date('m'))->where('status','Approved');

        $monthly_collections = $monthly_borders->sum('service')+$monthly_borders->sum('rent')+$monthly_borders->sum('advance')+$monthly_border_rents->sum('amount')+$monthly_meal_costs->sum('payment')+$monthly_meal_costs->sum('advance');
        $monthly_costs = $monthly_products->sum('sub_total')+$monthly_staffs->sum('amount')+$monthly_billings->sum('amount');
    }
}
