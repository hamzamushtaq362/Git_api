<?php

namespace App\Http\Controllers;

use App\Models\UserPermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions= new Permission; 
        $permissions->name=$request->name;
        $result= $permissions->save();
        if($result)
        {
            return ("New Role stored Successfully");
        }
        else
        {
            return ("New Role not stored");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permissions)
    {
        // $permissions->show();
        // $permissions= new Permission;
        $result=$permissions->get();
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $permissions= Permission::find($request->id);
        $permissions->name=$request->name;
        $result= $permissions->save();
        if($result)
        {
            return ("Role Updated");
        }
        else
        {
            return ("Role not Updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions= Permission::find($id);
        $result= $permissions->delete();
        if($result)
        {
            return ("Role Deleted successfully");
        }
        else
        {
            return ("Role not Delete");
        }
    }
}
