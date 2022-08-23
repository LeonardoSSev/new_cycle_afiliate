<!DOCTYPE html>
<html lang="en" dir="ltr">
	
<!-- Mirrored from laravel.spruko.com/clont/Leftmenu-Icon-LightSidebar-ltr/login by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Aug 2020 19:00:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Sistema CDEA New Cycle" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="Admin, Admin Template, Dashboard, Responsive, Admin Dashboard, Bootstrap, Bootstrap 4, Clean, Backend, Jquery, Modern, Web App, Admin Panel, Ui, Premium Admin Templates, Flat, Admin Theme, Ui Kit, Bootstrap Admin, Responsive Admin, Application, Template, Admin Themes, Dashboard Template"/>
		<!-- Title -->
<title>Sistema CDEA New Cycle</title>
<!--Favicon -->
<link rel="icon" href="images/faviconsb.png" type="image/x-icon"/>
<!-- Style css -->
<link href="assets/css/style.css" rel="stylesheet" />
<link href="assets/css/dark.css" rel="stylesheet" />
<!---Icons css-->
<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet" />
<link href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet" />
	</head>
		
	<body class="h-100vh dark-mode">	    
		
		<div class="page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col mx-auto">
							<div class="text-center mb-6">
								<img src="images/logosb.png" style="width: 150px;height: 150px;" class="header-brand-img desktop-lgo" alt="Clont logo">
								<img src="images/logosb.png"  style="width: 150px;height: 150px;" class="header-brand-img dark-logo" alt="Clont logo">
							</div>
							<div class="row justify-content-center">
								<div class="col-md-6">
									<div class="card-group mb-0">
										<div class="card p-4">
											<div class="card-body">
												<h1>Login</h1>
												<p class="text-muted">Faça seu Login</p>
												<form action="doLogin" method="post">
												<div class="input-group mb-3">
													<span class="input-group-addon"><i class="fa fa-user"></i></span>
													<input type="text" name="usuario" class="form-control" placeholder="Usuário">
												</div>
												<div class="input-group mb-4">
													<span class="input-group-addon"><i class="fa fa-lock"></i></span>
													<input type="password" name="senha" class="form-control" placeholder="Senha">
												</div>
													 <div class="" align="center" style="margin-bottom:2%;">
														<div class="recaptcha">
									
									<div id="recaptcha" class="recaptcha-identifier"></div>
								</div>
												<div class="row">
													<div class="col-12">
														<button type="submit" class="btn btn-primary btn-block">Login</button>
													</div>
													<div class="col-12">
														<a href="esqueceu" class="btn btn-link box-shadow-0 px-0">Esqueceu Sua Senha?</a>
													</div>
												</div>
												</form>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		<!-- Jquery js-->
<script src="assets/js/vendors/jquery-3.4.0.min.js"></script>
<!-- Bootstrap4 js-->
<script src="assets/js/vendors/popper.min.js"></script>
<script src="assets/js/vendors/bootstrap.min.js"></script>
<!--Othercharts js-->
<script src="assets/plugins/othercharts/jquery.sparkline.min.js"></script>
<!-- Circle-progress js-->
<script src="assets/js/vendors/circle-progress.min.js"></script>
<!-- Jquery-rating js-->
<script src="assets/plugins/rating/jquery.rating-stars.js"></script>
		
		  <script>






    var recaptcha;

    function renderReCaptcha() {
        var captchas = Array.prototype.slice.call(document.getElementsByClassName("recaptcha-identifier"));
        if (captchas.length != 0){
            captchas.forEach(function (elem, index) {
                var captchaId = elem.id;
                recaptcha = grecaptcha.render(captchaId, { 'sitekey' : '<?=$param['recaptcha']['sitekey'];?>', 'theme' : 'light' });
                elem.dataset.recaptcha_id = recaptcha;
            });
        }
    }


    

</script>
<script src='//www.recaptcha.net/recaptcha/api.js?onload=renderReCaptcha&render=explicit&hl=pt-br' async defer></script>
	
	</body>

<!-- Mirrored from laravel.spruko.com/clont/Leftmenu-Icon-LightSidebar-ltr/login by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Aug 2020 19:00:49 GMT -->
</html>