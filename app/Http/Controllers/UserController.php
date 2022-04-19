<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
class UserController extends Controller
{
    public function index(Request $request)
    {
      if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            $btn = '<a href="/edit" class="edit btn btn-primary btn-sm">View</a>
                            <a href="/edit" class="edit btn btn-primary btn-sm">Edit</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('user');
    }


    public function edit()
    {
      return "Edit";
    }


    
}
