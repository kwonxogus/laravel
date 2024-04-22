@extends('layout.master')

@section('script')
<script>
	function go_action(){
		alert(1);
	}

	function forgotP(){
		alert("관리자에게 문의하세요");
	}
</script>
@endsection
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-5">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
				<div class="card-body">
					<form name="form" id="form" action="" method="POST">
						<div class="form-floating mb-3">
							<input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
							<label for="inputEmail">Email address</label>
						</div>
						<div class="form-floating mb-3">
							<input class="form-control" id="inputPassword" type="password" placeholder="Password" />
							<label for="inputPassword">Password</label>
						</div>
						<div class="form-check mb-3">
							<input class="form-check-input" id="inputRememberEmail" type="checkbox" value="" />
							<label class="form-check-label" for="inputRememberEmail">Remember Email</label>
						</div>
						<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
							<a class="small" href="javascript:forgotP();">Forgot Password?</a>
							<a class="btn btn-primary" href="javascript:go_action();">Login</a>
						</div>
					</form>
				</div>
				<div class="card-footer text-center py-3">
					<!-- <div class="small"><a href="register.html">Need an account? Sign up!</a></div> -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection