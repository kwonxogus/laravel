<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
		<script>
			function go_action(){
				const uid = document.getElementById("uid").value;
				const upw = document.getElementById("upw").value;

				if(uid == ''){
					alert("id를 입력해주세요");
					return false;
				}

				if(upw == ''){
					alert("비밀번호를 입력해주세요");
					return false;
				}

				//submit()전에 데이터 검사 필요
				const loginform = document.getElementById("loginform");
				loginform.submit();
			}

			function join_mem(){
				const wnd = window.open("/joinForm","_blank","height=600px,width=500px");
			}

			function forgotP(){
				alert("관리자에게 문의하세요");
			}
		</script>
    </head>
	@if(Session::has('alert'))
		@php
			echo '<script>';
			echo "alert('".Session::get('alert')."');";
			echo '</script>';
		@endphp
	@endif
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
					<form id="loginform" method="post" action="/loginAction">
					@csrf
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-5">
									<div class="card shadow-lg border-0 rounded-lg mt-5">
										<div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
										<div class="card-body">
											<form>
												<div class="form-floating mb-3">
													<input class="form-control" id="uid" type="text" name="uid" placeholder="ex)dvdv1313" />
													<label for="uid">ID</label>
												</div>
												<div class="form-floating mb-3">
													<input class="form-control" id="upw" type="password" name="upw" placeholder="password" />
													<label for="upw">Password</label>
												</div>
												<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
													<a class="small" href="password.html">Forgot Password?</a>
													<a class="btn btn-primary" href="javascript:go_action();">Login</a>
												</div>
											</form>
										</div>
										<div class="card-footer text-center py-3">
											<div class="small"><a href="register.html">Need an account? Sign up!</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
