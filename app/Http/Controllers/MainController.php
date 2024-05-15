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
    
    #게시글 작성, 좋아요, 댓글 만들 예정
    #리스트에서 검색, 페이징



    #Redis, git 명령어 확인
    # git 명령어 연습
    # git add 파일명 ( staged로 올리는 것)
    # git add -A (변경파일 전체 올림)
    # git commit -m [커밋메시지]
    # git push origin
    # git stash, pop, apply, list
    # 수정한 파일을 올리려고 하는데
    # 같은 파일 변경내용이 적용되어있을때 사용함
    # stash로 내가 수정한 파일 임시로 넣고 변경된 내용 가져와서 적용
    # branch 생성

    
}
