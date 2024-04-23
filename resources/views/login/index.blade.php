@extends('layout.master')

@section('script')

@if(Session::has('alert'))
	@php
		echo '<script>';
		echo "alert('".Session::get('alert')."');";
		echo '</script>';
	@endphp
@endif
<script>
	function go_action(){
		//submit()전에 데이터 검사 필요
		const loginform = document.getElementById("loginform");
		loginform.submit();
	}

	function forgotP(){
		alert("관리자에게 문의하세요");
	}
</script>
@endsection

@section('content')
<div style="width:50%; margin: 10px auto; margin-top:50px;">
	<div id="container">
		<!--  login 폼 영역을 : loginBox -->
		<form id="loginform" method="post" action="/loginAction">
			@csrf
			<!-- 로그인 페이지 타이틀 -->
			<div id="loginBoxTitle">Laravel Login</div>
			<!-- 아이디, 비번, 버튼 박스 -->
			<div id="inputBox">
				<div class="input-form-box my-4">
					<span>아이디 </span>
					<input type="text" name="uid" class="form-control">
				</div>
				<div class="input-form-box my-4">
					<span>비밀번호 </span>
					<input type="password" name="upw" class="form-control">
				</div>
				<div class="button-login-box my-4">
					<button type="button" class="btn btn-primary btn-xs" style="width:50%" onclick="go_action();">로그인</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection