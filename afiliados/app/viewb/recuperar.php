<!doctype html>
<html lang="en">
	
<!-- login.html  [XR&CO'2014], Sun, 17 Feb 2019 10:25:38 GMT -->

<!-- Mirrored from wordpressbusiness.top/admin10/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jun 2020 03:26:40 GMT -->
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Ajuda Mútua APP" />
		<meta name="keywords" content="Sistema de Doação" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="images/favicon.png" />
		<title>Login - Esqueceu Senha</title>
		
		<!--
			**********************
			**********************
			Common CSS files
			**********************
			**********************
		-->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />

		<!-- Icomoon Icons CSS -->
		<link rel="stylesheet" href="fonts/icomoon/icomoon.css" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="css/main.css" />

	</head>


		<body style="background-image:url(images/fundos.png); background-repeat:no-repeat; background-size:cover;">
		    		<!-- Container start -->
		<div class="container" align="center">
			<form action="" method="post">
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
						    <a href="https://ajudamutua.app/" class="m-2"><img src="images/home.png" style="width: 160px;" class="img-fluid" alt="Home">
								 </a>
							<div class="login-box">
							    <a -href="#" class="login-logo" align="center">
		<img src="images/logos.png" alt="Ajuda Mútua APP" /><br><b>Transformando Vidas e Realizando Sonhos
								</br></b></a>
							<div class="form-group">
									<input type="password" name="novasenha" class="form-control" placeholder="Senha" />
								</div>
								<div class="form-group">
									<input type="password" name="csenha" class="form-control" placeholder="Confirmar Nova Senha" />
                                </div>
                                <div class="form-group" align="center">
                                <div class="recaptcha">

<div id="recaptcha" class="recaptcha-identifier"></div>
</div>
								</div>
								<div class="actions">
									<button type="submit" class="btn btn-primary btn-block">Atualizar</button>
									<a href="./">Voltar ao Login?</a>
								</div>
													</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<!-- Container end -->

    </body>
    
    <script>
    var recaptcha;

    function renderReCaptcha() {
        var captchas = Array.prototype.slice.call(document.getElementsByClassName("recaptcha-identifier"));
        if (captchas.length != 0){
            captchas.forEach(function (elem, index) {
                var captchaId = elem.id;
                recaptcha = grecaptcha.render(captchaId, { 'sitekey' : '<?=$param['recuperar']['sitekey'];?>', 'theme' : 'dark' });
                elem.dataset.recaptcha_id = recaptcha;
            });
        }
    }

</script>
<script src='//www.recaptcha.net/recaptcha/api.js?onload=renderReCaptcha&render=explicit&hl=pt-br' async defer></script>

<!-- login.html  [XR&CO'2014], Sun, 17 Feb 2019 10:25:38 GMT -->

<!-- Mirrored from wordpressbusiness.top/admin10/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jun 2020 03:26:41 GMT -->
</html>