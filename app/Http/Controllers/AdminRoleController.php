<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authRoles = Role::query()->where('roles_type',1)->get();
        $genRoles = Role::query()->where('roles_type',0)->get();

        return view('admin.roles.index', compact('authRoles','genRoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));

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
            'name'          => 'required|string|max:190|unique:roles',
            'display_name'  => 'required|string|max:190',
            'description'   => 'required|string|max:190',
            'permissions'   => 'required'
        ]);

        $store = new Role();

        $store->name            = $request->name;
        $store->display_name    = $request->display_name;
        $store->description     = $request->description;
        $store->roles_type      = $request->roles_type;

        $store->save();

        foreach ($request->input('permissions') as $key=>$value){
            $store->attachPermission($value);
        }

        Session::flash('message','New Role has been Created Successfully!!!');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::query()->findOrFail($id);

        return view('admin.roles.show',compact('roles'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::query()->findOrFail($id);
        $permissions = Permission::all();
        $checked = DB::table('permission_role')->where('permission_role.role_id',$id)->pluck('permission_role.permission_id')->toArray();
        return view('admin.roles.edit', compact('roles','permissions','checked'));
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
        $update = Role::query()->findOrFail($id);

        if($update->name !== $request->name)
            $this->validate($request, [
            'name' => 'required|string|max:190|unique:roles'
            ]);
        if($update->display_name !== $request->display_name)
            $this->validate($request, [
            'display_name' => 'required|string|max:190|unique:roles'
            ]);
        if($update->description !== $request->description)
            $this->validate($request, [
            'description' => 'required|string|max:190|unique:roles'
            ]);
        else
        $this->validate($request,[
            'name'          => 'required|string|max:190',
            'display_name'  => 'required|string|max:190',
            'description'   => 'required|string|max:190',
            'permissions'   => 'required'
        ]);

        $update->name = $request->name;
        $update->display_name = $request->display_name;
        $update->description = $request->discription;
        $update->roles_type = $request->roles_type;

        $update->save();

        DB::table('permission_role')->where('permission_role.role_id',$id)->delete();

        foreach ($request->input('permissions') as $key=>$value){
            $update->attachPermission($value);
        }

        Session::flash('message','Roles Updated Successfully!!!');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::whereId($id)->delete();

        Session::flash('message','The Role is Deleted Successfully!!!');
        return redirect()->back();
    }
}
