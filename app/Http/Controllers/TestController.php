<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function create()
    {
        return view('Role/create');
    }

    public function show()
    {
        // return Test::all();
        $data=Test::all();
        return response()->json($data);
    }

    public function update(Request $req)
    {
        $test= Test::find($req->id);
        $test->name=$req->name;
        $test->email=$req->email;
        $result= $test->save();
        if($result)
        {
            return ("Updated");
        }
        else
        {
            return ("not Updated");
        }
    }

    public function destroy($id)
    {
        $test= Test::find($id);
        $result= $test->delete();
        if($result)
        {
            return ("Delete");
        }
        else
        {
            return ("not Delete");
        }
    }
}
