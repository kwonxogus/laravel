<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    #main화면에서는 대시보드 편성해서 보여줄 것
    public function main(Request $request){
        $list = DB::table('board_list')
					->select('*')
                    ->orderby('no')
                    ->get();
        return view('main')->with('list',$list);
    }

    #게시글 보는 페이지
    public function listP(Request $request, $no){
        $board = DB::table('board_list')
                    ->select('*')
                    ->where('no',$no)
                    ->first();
        if(!isset($board)){
            return redirect()->back()->with('alert','삭제되었거나 존재하지 않는 글 입니다.');
        }
        if($board->save_status != 'Y'){
            return redirect()->back()->with('alert','삭제되었거나 존재하지 않는 글 입니다.');
        }
        return view('board.board')->with('board', $board);
    }
    
    #게시글 작성, 리스트, 좋아요, 댓글 만들 예정
}
