<!DOCTYPE html>
<html lang="en">
<head>
	<title>SOS Ballet - Cadastro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--icon  -->
	<link rel="icon" type="image/png" href="/assets/img/icone/icone.jpg"/>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/validacao.css">
	<!-- JQuery -->
	<script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
	<script src="/assets/js/jquery.validate.min.js"></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/assets/img/loginCadastro/loginbg.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" id="cadastro" action="/auth/cadastro">
					

					<span class="login100-form-title p-b-34 p-t-27">
					Cadastro
					</span>
					<div class="wrap-input100">
						<input class="input100" type="text" id="name" name="name" placeholder="Nome">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
						
					</div>
				
					<label for="name" class="error"></label>
					<br>
                    <div class="wrap-input100">
						<input class="input100" type="text" id="last_name" name="last_name" placeholder="Sobrenome">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<label for="last_name" class="error"></label>
					<br>
                    <div class="wrap-input100">
						<input class="input100" type="text" id="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<label for="email" class="error"></label>
					<br>
					<div class="wrap-input100">
						<input class="input100" type="password" id="passwd" name="passwd" placeholder="Senha">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<label for="passwd" class="error"></label>
					<br>
                    <div class="wrap-input100">
						<input class="input100" type="password" id="passwd_confirm" name="passwd_confirm" placeholder="Confirmar senha">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<label for="passwd_confirm" class="error"></label>
					<br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
							Cadastro
						</button>	
		
                    </div>
					<div class="text-center p-t-90">
						<a class="txt2" href="/auth/entrar">
							Já possui cadastro
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	<script src="/assets/js/main2.js"></script>
	<script src="/assets/js/validacao.js"></script>

	<script>
             $(function(){
                    $("#cadastro").validate();
			 });
			 
			
			 	

       </script>

</body>
</html>