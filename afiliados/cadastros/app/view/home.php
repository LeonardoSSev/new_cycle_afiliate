<!doctype html>
<html lang="en">


<!-- Mirrored from bootstraptemplatedesign.com/demo-application/helpdesk/frontend-site/html/signup1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jul 2018 02:27:39 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<!-- fontawesome icons CSS -->
	<link rel="stylesheet" href="assets/vendor/fontawesome4.7.0/css/font-awesome.min.css" type="text/css">

	<!-- Custome scrollbar CSS -->
	<link rel="stylesheet" href="assets/vendor/jquery-custom-scrollbar-0.5.5/jquery-custom-scrollbar-0.5.5/jquery.custom-scrollbar.css" type="text/css">

	<!-- framework CSS -->
	<link id="theme" rel="stylesheet" href="assets/css/style-helpdesk.css" type="text/css">


	<title>Cadastros - Sistema de Ajuda Mútua</title>
</head>

<body class="fixed-header sticky-footer">
    <div class="loader-logo">
		<img src="assets/img/logo.png" alt="#">
		<br>
		<div class="loader-ellipsis">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<div class="background bg-dark">
		<img src="assets/img/bg-modern-wide.png" alt="" class="full-opacity">
	</div>
	<div class="wrapper">
	


		<!-- main container starts -->
		<div class="main-container">

			<!-- Begin page content -->
			<div class="container" style="margin-top:-200px;">
				<div class="card rounded-2 border-0 mb-3 z3 signin-block">
					<div class="card-body pr-5 pl-5">
						<h1 class="display-4 text-center d-block">Cadastros</h1>
                        <br>
                        <form action="" method="post" id="cadastros">
						<input type="hidden" name="indicacao" value="<?=$param['dados']['indicacao'];?>">
						<div class="form-group text-left float-label">
							<input type="text" name="nome" class="form-control">
							<label>Seu Nome Completo</label>
						</div>
						<div class="form-group text-left float-label">
							<input type="email" name="email" class="form-control">
							<label>Seu Email</label>
                        </div>
                        <div class="form-group text-left float-label">
							<input type="text" name="cpf" class="form-control">
							<label>Seu CPF</label>
                        </div>
                        <div class="form-group text-left float-label">
							<input type="text" name="whatsapp" class="form-control">
							<label>Seu Whatsapp</label>
						</div>
						<?php if($param['dados']['mibank'] == '1'){?>
                        <div class="form-group text-left float-label">
							<input type="text" name="mibank" class="form-control">
							<label>Sua Conta Mibank</label>
						</div>
						<?php } ?>
                        <div class="form-group text-left float-label">
							<input type="text" name="usuario" required class="form-control">
							<label>Seu Login</label>
                        </div>
						<div class="form-group text-left float-label">
							<input type="password" name="senha" id="senha" class="form-control">
							<label>Sua Senha</label>
                        </div>
                        <div class="form-group text-left float-label">
							<input type="password" name="csenha" id="csenha" class="form-control">
							<label>Confirmar sua Senha</label>
						</div>
					<!--	<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1"> Eu aceito
								<a href="#" >Termos e Condições</a>
							</label>
						</div>-->
						<br>
						<div>
							<button class="btn btn-primary btn-block col" type="button" onclick="verificar()">Cadastrar</button>
							<br>
						</div>
                        </form>
					</div>
				</div>
			</div>
		</div>
		<!-- main container ends -->
        <script>
	
	function verificar(){
		
		senha1 = document.getElementById('senha').value;
		senha2 = document.getElementById('csenha').value;
		termos = document.getElementById('customCheck1');
		
	
		if(senha1 != senha2){
			alert('Senhas nao coincidem');
		}else{
			
			document.getElementById('cadastros').submit();
			
		}
	}
	
</script>
        

	</div>
	<!-- wrapper ends -->


	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="assets/vendor/jquery-3.2.1.min.js"></script>
	<script src="assets/vendor/popper.min.js"></script>
	<script src="assets/vendor/bootstrap-4.1.1/bootstrap.min.js"></script>

	<!--Cookie js for theme chooser and applying it --> 
	<script src="assets/vendor/cookie/jquery.cookie.js"></script> 

	<!-- Circular progress -->
	<script src="assets/vendor/jquery-custom-scrollbar-0.5.5/jquery-custom-scrollbar-0.5.5/jquery.custom-scrollbar.min.js"></script>

	<!-- Circular progress -->
	<script src="assets/vendor/cicular_progress/circle-progress.min.js"></script>

	<!-- Sparklines chartsw -->
	<script src="assets/vendor/sparklines/jquery.sparkline.min.js"></script>

	<!-- Other JavaScript -->
	<script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from bootstraptemplatedesign.com/demo-application/helpdesk/frontend-site/html/signup1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jul 2018 02:27:39 GMT -->
</html>