@extends('layout.master')

@section('script')
<script>
    function join_mem(){
        const form = document.getElementById("joinform");

        const id = document.getElementById("jid").value;
        const pw = document.getElementById("jpw").value;
        const pwChk = document.getElementById("jpwChk").value;

        if(id==''){
            alert("id를 입력하세요");
            return false;
        }
        if(pw==''){
            alert("패스워드를 입력하세요");
            return false;
        }
        if(pw!=pwChk){
            alert("패스워드를 확인해주세요");
            return false;
        }
    }
</script>
@endsection

@section('content')
<div style="width:70%; margin: 10px auto; margin-top:50px;">
	<div>
		<form id="joinform" method="post" action="/joinAction">
			@csrf
			<!-- 아이디, 비번, 버튼 박스 -->
			<div>
				<div class="input-form-box my-4">
					<span>아이디 </span>
					<input type="text" id="jid" name="jid" class="form-control" placeholder="id를 입력하세요">
				</div>
				<div class="input-form-box my-4">
					<span>비밀번호 </span>
					<input type="password" id="jpw" name="jpw" class="form-control">
				</div>
                <div class="input-form-box my-4">
					<span>비밀번호 재입력</span>
					<input type="password" id="jpwChk" name="jpwChk" class="form-control">
				</div>
				<div class="button-login-box my-4">
					<button type="button" class="btn btn-primary btn-xs" style="width:48%" onclick="join_mem();">가입하기</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection