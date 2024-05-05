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

    #게시글 작성, 리스트, 좋아요, 댓글 만들 예정
}
