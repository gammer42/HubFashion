<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{



    public function index()
    {
        //
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $this->validate($request,[

            'username' => 'required|string|max:190|unique:users',
            'first_name' => 'required|string|max:190',
            'email' => 'required|string|email|max:190|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $store = new User();

        $store->username = $request->username;
        $store->first_name = $request->first_name;
        $store->last_name = '(user)';
        $store->email = $request->email;
        $store->password = Hash::make($request->password );
        $store->user_type = false;
        $store->user_status = true;

        $store->save();

        $roles = DB::table('roles')->where('roles.name','=','user')->first();
        $role = $roles->id;
        $store->attachRole($request->input($role));

        Session::flash('message','New User Created Successfully!');
        return redirect()->route('index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function login(Request $request){

        $this->validate($request,[

            'email' => 'required|email',
            'password' => 'required'

        ]);

        $email = $request->email;
        $username = $request->email;
        $password = $request->password;

        $login_check = User::query()->where('email',$email)->orWhere('username',$username)->first();

        if(Hash::check($password,$login_check['password'])){
            Session::flash('message','Login Success!!!');
            Session::put('user',$login_check['username']);
            Session::put('id',$login_check['id']);
            return redirect()->back();
        }
        else
        {
            Session::flash( 'error', 'User Name & Password does not match!');
            return redirect()->route('index');
        }
    }

    public function logout(){
        Session::flush();
        return redirect()->back();
    }
}
