<!doctype html>
<html lang="en">


<!-- Mirrored from bootstraptemplatedesign.com/demo-application/helpdesk/frontend-site/html/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jul 2018 02:21:26 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<!-- fontawesome icons CSS -->
	<link rel="stylesheet" href="assets/vendor/fontawesome4.7.0/css/font-awesome.min.css" type="text/css">

	<!-- Custome scrollbar CSS -->
	<link rel="stylesheet" href="assets/vendor/jquery-custom-scrollbar-0.5.5/jquery-custom-scrollbar-0.5.5/jquery.custom-scrollbar.css" type="text/css">
    
	<!-- Footable CSS -->
	<link rel="stylesheet" href="assets/vendor/footable-bootstrap.latest/css/footable.bootstrap.min.css" type="text/css">

	<!-- framework CSS -->
	<link id="theme" rel="stylesheet" href="assets/css/style-helpdesk.css" type="text/css">

	<!-- https://bootstraptemplatedesign.com/demo-application/helpdesk/frontend-site/html/dashboard.html# -->
	    <!-- photoswipe CSS -->
	<link href="assets/vendor/PhotoSwipe-master/PhotoSwipe-master/dist/photoswipe.css" rel="stylesheet">
    <link href="assets/vendor/PhotoSwipe-master/PhotoSwipe-master/dist/default-skin/default-skin.css" rel="stylesheet">

	 <!-- JS dependencies -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	   <!-- CSS dependencies -->
	   <link rel="stylesheet" type="text/css" href="bootstrap.min.css">




	<title>Ajuda Mútua Manual - Escritório Virtual</title>
</head>

<body class="fixed-header sticky-footer menuleft-open">
<!--	<div class="loader-logo">
		<img src="assets/img/logo.png" alt="bootstrap template design by maxartkiller">
		<br>
		<div class="loader-ellipsis">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>-->
	<div class="wrapper">
		<!-- header starts -->
		<header class="border-bottom">
			<!-- Fixed navbar -->
			<nav class="navbar navbar-expand-sm ">
				<a class="navbar-brand" href="#">
					<img src="assets/img/logo.png" alt="">
					<h5 class="text-uppercase visible-md">
						<span>Ajuda Mútua Manual</span>
						<small><?php foreach($param['header']['usuario'] as $usuario){ 	
							$explode = explode(" ",$usuario['nome']);
							$nome = $explode[0];
							
							print $nome;}?> </small>
					</h5>
				</a>
				<button class="btn btn-link menu-btn sq-btn rounded-0 border-right " type="button" id="sidebar-left">
					<span class="fa fa-bars"></span>
				</button>

				<div class="d-flex col p-0" id="navbarCollapse">

					<form class="form-inline search-form mr-auto">
                      <!-- <input class="form-control bg-none" type="text" placeholder="Search..." aria-label="Search">-->
						<button class="btn btn-link text-secondary search-btn" type="button">
							<i class="fa fa-search"></i>
						</button>
						<button class="btn btn-link text-secondary search-close-btn" type="button">
							<i class="fa fa-close"></i>
						</button>
					</form>
					<div class="d-block ">
						
						<div class="dropdown float-left">
							<button class="btn btn-link sq-btn menu-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
							 type="button">
								<span class="fa fa-envelope-o"></span>
							</button>
							
							<div class="dropdown-menu dropdown-menu-center mega rounded-0 arrow-success">
								<div class="title bg-success text-white rounded-0">
									<i class="fa fa-bell-o "></i> Mensagens</div>
								
									<div class="tab-pane fade show active scroll-y" id="tab13" role="tabpanel">
										<div class="list-unstyled userlist">
										<?php foreach($param['header']['mensagens'] as $mensagens){ ?>
											<a class="item" href="vermensagem?i=<?=$mensagens['id'];?>">
												<div class="media">
													<figure class="avatar36 rounded-circle z2 align-self-start mr-3">
													<i class="fa fa-user"></i>
													<!--	<img src="assets/img/user2.png" alt="Generic placeholder image">-->
													</figure>
													<div class="media-body">
														<h5 class="time-title"><?=$mensagens['assunto'];?>
															
														</h5>
														<?php print substr($mensagens['texto'], 0, 30);?>
													</div>
												</div>
											</a>
										<?php } ?>
										</div>
									</div>

							</div>
						</div>

							<div class="dropdown float-left">
							<button class="btn btn-link sq-btn menu-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
							 type="button">
								<span class="fa fa-bell-o"></span>
							</button>
							
							<div class="dropdown-menu dropdown-menu-center mega rounded-0 arrow-success">
								<div class="title bg-success text-white rounded-0">
									<i class="fa fa-bell-o "></i> Notificações</div>
								
									<div class="tab-pane fade show active scroll-y" id="tab13" role="tabpanel">
										<div class="list-unstyled userlist">
										<?php foreach($param['header']['notificacao'] as $notificacao){ ?>
											<a class="item" href="vermensagem?i=<?=$notificacao['id'];?>">
												<div class="media">
													<figure class="avatar36 rounded-circle z2 align-self-start mr-3">
													<i class="fa fa-users"></i>
													</figure>
													<div class="media-body">
														<h5 class="time-title"><?=$notificacao['assunto'];?>
															
														</h5>
														<?php print substr($notificacao['texto'], 0, 30);?>
													</div>
												</div>
											</a>
										<?php } ?>	
										</div>
									</div>

							</div>
						</div>
					
					</div>


					<div class="d-block">

						<div class="dropdown float-left">
							<a href="#" class="btn btn-link text-dark user-profile invisible-sm">
								<figure class="avatar30 rounded-circle m-0">
								<?php foreach($param['header']['fotos'] as $fotos){ 
							if($fotos['fotos'] == ""){
						?>
							<img src="images/sem_foto.gif" style="border-radius:100px;width:30px;height:30px;" alt="">
						<?php }else{ ?>
							<img src="fotos/<?=$fotos['fotos'];?>" style="border-radius:100px;width:30px;height:30px;" alt="">
						<?php }} ?>
								</figure>								
							</a>
							<button class="btn btn-secondary sq-btn rounded-0 dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true"
							 aria-expanded="false" type="button">
								<span class="fa fa-angle-down"></span>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="dadospessoais">Dados Pessoais</a>
								<a class="dropdown-item" href="dadosbancarios">Dados Bancários</a>
								<a class="dropdown-item" href="minhasfotos">Minhas Fotos</a>
								<a class="dropdown-item" href="seguranca">Segurança</a>
								<a class="dropdown-item" href="sair">Sair</a>
							</div>
						</div>

					<!--	<button class="btn btn-success sq-btn border-0 rounded-0  text-white" type="button" id="sidebar-right">
							<span class="icon fa fa-angle-double-left"></span>
						</button>
						-->
					</div>
				</div>
			</nav>
		</header>
		<!-- header ends -->