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
		//dd(hash("sha512","1234"));
		$req = $request->all();

		$idChk = DB::table('member_list')
					->select('id','pw')
					->where('id',$req['uid'])
					->first();
		//dd($idChk->id);

		if(!isset($idChk->id)){
			return redirect()->back() ->with('alert', 'id가 존재하지 않습니다.');
		}
		else{
			//현재 디비에 패스워드 암호화 없음
			if(hash("sha512",$req['upw']) != $idChk->pw){
				return redirect()->back() ->with('alert', '비밀번호를 틀렸습니다.');
			}
		}
		
		//로그인 성공시 세션에 아이디 정보 담음
		$request->session()->put('id',$req['uid']);
		return redirect()->route('main');
	}

	public function joinForm(Request $request){
		return view('login.joinForm');
	}
}
