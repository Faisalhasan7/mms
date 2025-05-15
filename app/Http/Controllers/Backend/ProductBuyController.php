<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductBuy;
use App\Models\Staff;
use Illuminate\Http\Request;

class ProductBuyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = ProductBuy::latest()->get();
        return view('admin.product-buy.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $staffs = Staff::latest()->get();
        return view('admin.product-buy.create',compact('staffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'staff_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'flat_no' => 'required',
            'quantity' => 'required',
        ],[
            'staff_id.required' =>"First select the Staff name",
            'product_name.required' =>"Please Enter Product Name",
            'flat_no.required' =>"Please Enter Flat No",
        ]);
        $product = new ProductBuy();
        $product->staff_id = $request->input('staff_id');
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->flat_no = $request->input('flat_no');
        $product->quantity = empty($request->quantity)?'1':$request->input('quantity');
        $product->sub_total = $request->quantity > 0 ? ($request->quantity * $request->price) : $request->price;
        $product->year = $request->input('year');
        $product->month = $request->input('month');
        $product->date = $request->input('date');
        $product->status = "Pending";
        $product->save();

        $notification = array(
            'message' => 'Product Cost Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.product_buy')->with($notification);
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
        $product = ProductBuy::findOrFail($id);
        return view('admin.product-buy.edit',compact('product','staffs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = ProductBuy::findOrFail($id);
        $product->staff_id = $request->input('staff_id');
        $product->product_name = $request->input('product_name');
        $product->flat_no = $request->input('flat_no');
        $product->price = $request->input('price');
        $product->quantity = empty($request->quantity)?'1':$request->input('quantity');
        $product->sub_total = $request->quantity > 0 ? ($request->quantity * $request->price) : $request->price;
        $product->year = $request->input('year');
        $product->month = $request->input('month');
        $product->date = $request->input('date');
        $product->status = $request->input('status');
        $product->update();

        $notification = array(
            'message' => 'Product Cost Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.product_buy')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = ProductBuy::findOrFail($id);
        $product->delete();

        $notification = array(
            'message' => 'Product Cost Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
