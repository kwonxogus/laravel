<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
	public function login(Request $request)
	{
		/*
		$results = DB::select('select * from member_list');
		dd($results);
		*/
		return view('login.index');
	}

	public function loginAction(Request $request){
		dd($request->all());
	}
}
