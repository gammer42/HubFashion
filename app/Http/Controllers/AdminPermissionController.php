<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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
            'name' => 'required|unique:permissions',
            'display_name' => 'required',
            'description' => 'required|max:190'
        ]);

        $store = new Permission();

        $store->name = $request->name;
        $store->display_name = $request->display_name;
        $store->description = $request->description;

        $store->save();

        Session::flash('message','New Permission Added!!!');
        return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permissions = Permission::query()->findOrFail($id);

        return view('admin.permission.show', compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::query()->findOrFail($id);

        return view('admin.permission.edit', compact('permissions'));
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
        $update = Permission::query()->findOrFail($id);
        if(!$update->name)
            $this->validate($request,[
                'name' => 'required|unique:permissions'
            ]);
        $this->validate($request,[
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required'
        ]);

        $update->name = $request->name;
        $update->display_name = $request->display_name;
        $update->description = $request->description;

        $update->save();

        Session::flash('message','Permission Update Successfully!!!');
        return redirect()->route('permission.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
