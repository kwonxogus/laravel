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
		세션 검사 후 비로그인 상태면 로그인 페이지
		로그인 상태면 메인 페이지 이동
		*/
		return view('login.index');
	}

	public function loginAction(Request $request){
		//dd($request->all());
		$req = $request->all();

		$idChk = DB::table('member_list')
					->select('id','pw')
					->where('id',$req['uid'])
					->first();
		//dd($idChk->id);

		if(!isset($idChk->id)){
			return redirect()->back() ->with('alert', 'id가 존재하지 않습니다.');
		}
	}
}
