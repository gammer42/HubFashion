<?php

namespace App\Http\Controllers;

use App;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;


class AdminUserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $admins = User::query()->where('user_type',1)->get();
        $generals = User::query()->where('user_type',0)->get();

        return view('admin.users.index',compact('admins','employees','generals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = App\Role::all();

        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'username' => 'required|string|max:190|unique:users',
            'first_name' => 'required|string|max:190',
            'last_name' => 'required|string|max:190',
            'email' => 'required|string|email|max:190|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required'
        ]);

        $store = new User();

        $store->username = $request->username;
        $store->first_name = $request->first_name;
        $store->last_name = $request->last_name;
        $store->email = $request->email;
        $store->password = Hash::make($request->password );
        $store->user_type = $request->type;
        $store->user_status = $request->status;

        $store->save();

        $store->attachRole($request->input('role'));

        Session::flash('message','New User Created Successfully!');
        return redirect()->route('admin-user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::query()->findorfail($id);
//        dd ($users);
        return view('admin.users.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::query()->findorfail($id);
        $roles = Role::all();
        $given_roles = DB::table('role_user')->where('role_user.user_id',$id)->select('role_user.role_id')->get();
        return view('admin.users.edit', compact('users','roles','given_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check = DB::table('users')->where('users.id',$id)->get();
        if($check[0]->email !== $request->email)
            $this->validate($request, [
                'email' => 'required|string|email|max:255|unique:users',
            ]);
        else if($check[0]->username !== $request->username)
            $this->validate($request, [
                'username' => 'required|string|max:255|unique:users',
            ]);

        $this->validate($request, [

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required'
        ]);

        $update = User::query()->findorfail($id);

        $update->username   = $request->username;
        $update->first_name = $request->first_name;
        $update->last_name  = $request->last_name;
        $update->email      = $request->email;
        $update->user_type = $request->type;
        $update->user_status = $request->status;

        $update->save();

        DB::table('role_user')->where('role_user.user_id',$id)->delete();

        $update->attachRole($request->input('role'));

        Session::flash('message','User Updated Successfully!');
        return redirect()->route('admin-user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::whereId($id)->delete();

        Session::flash('message','User Deleted Successfully!!!');
        return redirect()->back();
    }
}
