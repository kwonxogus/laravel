@extends('layout.master')

@section('script')
@endsection

@section('content')
    로그인 성공! 로그인한 id는 {{Session::get('id')}} 입니다.
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            리스트 예시
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>작성일</th>
                        <th>작성자</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>작성일</th>
                        <th>작성자</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($list as $k => $v)
                    <tr>
						<td>{{$v->no}}</td>
						<td>{{$v->title}}</td>
						<td>{{date('Y-m-d',strtotime($v->write_date))}}</td>
						<td>{{$v->worker_id}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection