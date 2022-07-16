<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\ValidationException;
use Validator;

class RoleController extends Controller
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
        // $role=Role::all();
        // $permission=Permission::all();
        $role = Role::find(2);
        $permission = Permission::find(2);
        $role->givePermissionTo($permission);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|unique:roles|max:10|min:4'
        ]);
      
        if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
        }
        else{
            $role= new Role; 
            $role->name=$request->name;
            $result= $role->save();
            return response()->json(["message"=>"New Role stored Successfully"]);
        }
        // 2nd Code
        // $validated = $request->validate([
        //     'name' => 'required|max:25|min:4'
        // ]);
        // if($validated)
        // {
        //     $role= new Role; 
        //     $role->name=$request->name;
        //     $result= $role->save();
        //     return response()->json(["message"=>"New Role stored Successfully"]);
        // }
        // else
        // {
        //     return response()->json($validated->errors(), 201);
        // }
        
        // if($result)
        // {
        //     return response()->json(["message"=>"New Role stored Successfully"], 201);
        // }
        // else
        // {
        //     return ("New Role not stored");
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Role $roles)
    {
        $result=$roles->get();
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(role $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $roles= Role::find($request->id);
        $roles->name=$request->name;
        $result= $roles->save();
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
     * @param  \App\Models\role  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles= Role::find($id);
        $result= $roles->delete();
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
