<!doctype html>
<html >
	
<!-- index.html  [XR&CO'2014], Sun, 17 Feb 2019 10:23:06 GMT -->

<!-- Mirrored from wordpressbusiness.top/admin10/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jun 2020 03:26:23 GMT -->
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Ajuda Mútua APP" />
		<meta name="keywords" content="Sistema de Doações" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="images/favicon.png" />
		<title>Ajuda Mútua Escritório Virtual</title>
		
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
	<!--
			**********************
			**********************
			Optional CSS files
			**********************
			**********************
		-->

	

		<!-- Circliful CSS -->
		<link rel="stylesheet" href="vendor/circliful/circliful.css" />

		<!-- C3 CSS -->
		<link rel="stylesheet" href="vendor/c3/c3.min.css" />	
		
		<!-- Data Tables CSS -->
		<link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
		<link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />
		<!-- Chat App CSS -->
		<link rel="stylesheet" href="css/chat.css" />
		<script src="js/time-counter.js"></script>
		

	</head>
	<body>

		<!-- Loading start -->
		<div id="loading-wrapper">
			<div id="loader"></div>
		</div>
		<!-- Loading end -->

		<!-- BEGIN .app-wrap -->
		<div class="app-wrap">

			<!-- BEGIN .app-heading -->
			<header class="app-header">
				<div class="container-fluid">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
							
							<!-- BEGIN .logo -->
							<div class="logo-block">
								<a href="./" class="logo">
									<img src="images/logos.png" alt="Ajuda Mùtua APP" />
								</a>
							</div>
							<!-- END .logo -->

						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">

							<!-- Header actions start -->
							<ul class="header-actions">
								
								<li class="dropdown">
									<a href="#" id="userSettings" class="user-settings clearfix" data-toggle="dropdown" aria-haspopup="true">
										<span class="avatar">
											<i class="icon-account_circle"></i>
										</span>
										<span class="user-name"><?php foreach($param['header']['usuario'] as $usuario){ 	
							$explode = explode(" ",$usuario['nome']);
							$nome = $explode[0];
							
							print $nome;}?> <i class="icon-chevron-small-down downarrow"></i></span>
									</a>
									<div class="dropdown-menu md dropdown-menu-right" aria-labelledby="userSettings">
										<div class="admin-settings">
											<ul class="admin-settings-list">
												<li>
													<a href="dadospessoais">
														<span class="icon icon-face"></span>
														<span class="text-name">Dados Pessoais</span>
														
													</a>
												</li>
												<li>
													<a href="dadospagamento">
														<span class="icon icon-notifications_none"></span>
														<span class="text-name">Dados de Pagamento</span>
														
													</a>
												</li>
												
                                                <li>
													<a href="seguranca">
														<span class="icon icon-av_timer"></span>
														<span class="text-name">Segurança</span>
													</a>
												</li>
											</ul>
											<div class="actions">
												<a href="login.html" class="btn btn-primary">Logout</a>
											</div>
										</div>
									</div>
								</li>
							</ul>
							<!-- Header actions end -->

						

						</div>
					</div>
					<!-- Row start -->

				</div>
			</header>
			<!-- END: .app-heading -->