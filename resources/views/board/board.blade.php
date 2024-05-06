@extends('layout.master')

@section('script')
<script>
    function go_back(){
        history.back();
    }
</script>
@endsection

@section('content')
<div class="container text-center" style="width:80%; margin-top:35px;">
    <table class="table table-bordered border-primary">
        <tr>
            <td>글 제목</td>
            <td colspan="3">{{$board->title}}</td>
        </tr>
        <tr>
            <td>작성자</td>
            <td>{{$board->worker_id}}</td>
            <td>작성일자</td>
            <td>{{date("Y-m-d",strtotime($board->write_date))}}</td>
        </tr>
        <tr>
            <td colspan="4">
                <textarea style="width:100%; border:none; height:60vh;" disabled>
                    {{$board->content}}
                </textarea>
            </td>
        </tr>
    </table>
    <div>
        <input type="button" onclick="go_back();" value="목록">
    </div>
</div>
@endsection