<?php if( session('errors')): ?>
    <div class="alert alert-danger"><?= implode('<br>',  session('errors')) ?></div>
<?php endif;?>

<!-- <form method="POST" action="/createUser">
    <input type="text" name="nome" id="nome" />
    <input type="email" name="email" id="email" />
    <input type="password" name="password" id="password" />
    <button type="submit">Criar usuário</button>
</form> -->

<?php
 if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); 
endif;
?>
<?php if(session()->getFlashdata('erroSenhaUser')): ?>
	<div id="erroSenhaUser"><?= session()->getFlashdata('erroSenhaUser') ?></div>
<?php endif;?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./public/images/icons/favicon1.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./public/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./public/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="/createUser">
					<span class="login100-form-title p-b-26">
						Bem Vindo
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="nome">
						<span class="focus-input100" data-placeholder="Nome"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Registrar
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Já tem conta?
						</span>

						<a class="txt2" href="/login">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="./public/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="./public/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="./public/vendor/bootstrap/js/popper.js"></script>
	<script src="./public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="./public/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="./public/vendor/daterangepicker/moment.min.js"></script>
	<script src="./public/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="./public/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="./public/js/main.js"></script>
<!--===============================================================================================-->
	<script>
		setTimeout(function(){
        document.getElementsByClassName('erroSenhaUser').style.display = 'none';
    }, 5000);
	</script>

</body>
</html>