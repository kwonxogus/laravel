@extends('layout.master')

@section('script')
<script>
    function go_link(no){
        location.href = "/listP/"+no;
    }
</script>
@endsection

@section('content')
    @if(Session::has('alert'))
		@php
			echo '<script>';
			echo "alert('".Session::get('alert')."');";
			echo '</script>';
		@endphp
	@endif
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
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>작성일</th>
                        <th>작성자</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($list as $k => $v)
                    <tr>
						<td>{{$v->no}}</td>
						<td>{{$v->title}}</td>
						<td>{{date('Y-m-d',strtotime($v->write_date))}}</td>
						<td>{{$v->worker_id}}</td>
                        <td><button onclick="go_link({{$v->no}})">보기</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection