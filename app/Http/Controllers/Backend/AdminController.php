<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        $roles = Role::all();
        return view('admin.permission.users.index',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::all();
        $staffs = Staff::latest()->get();
        return view('admin.permission.users.create',compact('roles','staffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'username'  => 'required|unique:users',
            'email'     => 'required|email|unique:users',
            'password'  => 'required',
        ]);
        $staff              = Staff::find($request->staff_id);
        $user               = new User();
        $user->staff_id     = $staff->id;
        $user->name         = $staff->staff_name;
        $user->email        = $request->email??$staff->email;
        $user->username     = $request->username??$staff->email;
        $user->phone        = $request->phone??$staff->mobile;
        $user->password     = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.user')->with($notification);
    }

    public function user_edit(string $id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.permission.users.edit',compact('user','roles'));
    }
    public function user_update(Request $request, string $id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->update();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.user')->with($notification);
    }
    public function user_destroy(string $id){
        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
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
    public function profile(string $id)
    {
        //
        $user = User::findOrFail($id);

        return view('admin.user-profile.user-info',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->hasFile('photo')){
            $img = $request->file('photo');
            $imgext = $img->getClientOriginalExtension();
            $imgname = time().'-user-profile.'.$imgext;
            $img->move(public_path('backend/user_profile/'),$imgname);
            $user->photo = "backend/user_profile/".$imgname;
        }

        $user->update();

        $notification = array(
            'alert-type' => 'success',
            'message' => 'User Information Updated Successfully...!!!!!!'
        );

        return redirect()->back()->with($notification);
    }

    public function password_change(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-profile.password-update', compact('user'));
    }

    public function password_update(Request $request, string $id)
    {
        $request->validate([
            'confim_password' => 'same:newpassword'
        ]);
        $user = User::findOrFail($id);
        if(!Hash::check($request->oldpassword, $user->password)){
            $notification = array(
                'alert-type' => 'error',
                'message' => 'Old Password Does not Match....!'
            );
        }else if(!empty($request->newpassword) && Hash::check($request->oldpassword, $user->password)){
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->newpassword)
            ]);
            $notification = array(
                'alert-type' => 'success',
                'message' => 'Password Changed Successfully...!!!'
            );
        }

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Successfully Log Out...!!!!!!'
        );

        return redirect('/login')->with($notification);
    }
}
