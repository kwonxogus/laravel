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
			return redirect()->back()->with('alert', 'id가 존재하지 않습니다.');
		}
		else{
			if(hash("sha512",$req['upw']) != $idChk->pw){
				return redirect()->back()->with('alert', '비밀번호를 틀렸습니다.');
			}
		}
		
		//로그인 성공시 세션에 아이디 정보 담음
		$request->session()->put('id',$req['uid']);
		return redirect()->route('main');
	}

	public function joinForm(Request $request){
		return view('login.joinForm');
	}

	public function joinAction(Request $request){
		$req = $request->all();
		#dd($req);
		#jid, jpw, jpwChk, birthday, name
		if($req['jid'] == '' || !array_key_exists('jid',$req) ){	//id check
			return redirect()->back()->with('alert','id를 입력하세요');
		}
		if($req['jpw'] == '' || !array_key_exists('jpw',$req) ){	//pw check
			return redirect()->back()->with('alert','비밀번호를 입력하세요');
		}
		if($req['jpwChk'] == '' || !array_key_exists('jpwChk',$req) || $req['jpwChk'] != $req['jpw'] ){	//jpwChk check
			return redirect()->back()->with('alert','비밀번호가 일치하지 않습니다');
		}

		#id 중복체크
		$id_dup_chk = DB::table('member_list')
						->where('id',$req['jid'])
						->exists();
		if($id_dup_chk){
			return redirect()->back()->with('alert','중복된 id입니다. 다른 id를 입력하세요');
		}

		$in_arr = array();
		$in_arr['id'] = $req['jid'];
		$in_arr['pw'] = hash('sha512',$req['jpw']);
		$in_arr['name'] = $req['name']??null;
		$in_arr['birthday'] = $req['birthday']??null;

		$rslt = DB::table('member_list')->insert($in_arr);

		if($rslt){
			return redirect()->back()->with('rslt','회원 가입 완료되었습니다.');
		}
		else{
			return redirect()->back()->with('rslt','회원 가입이 실패했습니다. 다시 시도해주세요');
		}
	}
}
