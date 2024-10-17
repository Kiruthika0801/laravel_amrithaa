<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /** Users List */
    public function userList()
    {
        $usersList = User::all();
        $roleType = DB::table('role_type_users')->get();
        $designation = DB::table('roles_permissions')->get();
        return view('user.userlist',compact('roleType','designation','usersList'));
    }

    /** save new user */
    public function addNewUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone'     => 'required|min:11|numeric',
            'role_name' => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'department'=> 'required|string|max:255',
            'image'     => 'required|image',
        ]);
        DB::beginTransaction();
        try {
            $dt       = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();

            $image = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/images'), $image);

            $user = new User;
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->join_date    = $todayDate;
            $user->last_login   = $todayDate;
            $user->phone_number = $request->phone;
            $user->role_name    = $request->role_name;
            $user->position     = $request->position;
            $user->department   = $request->department;
            $user->status       = $request->status;
            $user->avatar       = $image;
            $user->password     = Hash::make('Hello@123');
            $user->save();
            DB::commit();
            Toastr::success('Create new account successfully :)','Success');
            return redirect()->back();
        }catch(\Exception $e) {
            DB::rollback();
            \Log::info($e);
            Toastr::error('User add new account fail :)','Error');
            return redirect()->back();
        }
    }
}
