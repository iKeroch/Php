<!DOCTYPE html>
<html lang="en">
<head>
	<title>SOS Ballet - Entrar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--icon  -->
	<link rel="icon" type="image/png" href="/assets/img/icone/icone.jpg"/>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/assets/img/loginCadastro/loginbg.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="/auth/entrar">
					<span class="login100-form-title p-b-34 p-t-27">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Digite o Email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Digite a Senha">
						<input class="input100" type="password" name="passwd" placeholder="Senha">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-90">
						<a class="txt2" href="/auth/cadastro">
						Fazer Cadastro</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
	<script src="/assets/js/main2.js"></script>

</body>
</html>