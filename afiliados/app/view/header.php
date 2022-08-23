<!DOCTYPE html>
<html lang="en" dir="ltr">
	
<!-- Mirrored from laravel.spruko.com/clont/Leftmenu-Icon-LightSidebar-ltr/index by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Aug 2020 18:57:12 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="CDEA New Cycle" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="Admin, Admin Template, Dashboard, Responsive, Admin Dashboard, Bootstrap, Bootstrap 4, Clean, Backend, Jquery, Modern, Web App, Admin Panel, Ui, Premium Admin Templates, Flat, Admin Theme, Ui Kit, Bootstrap Admin, Responsive Admin, Application, Template, Admin Themes, Dashboard Template"/>
		<!-- Title -->
<title>CDEA New Cycle</title>
<!--Favicon -->
<link rel="icon" href="images/faviconsb.png" type="image/x-icon"/>
<!-- Style css -->
<link href="assets/css/style.css" rel="stylesheet" />
<link href="assets/css/dark.css" rel="stylesheet" />
<!--Sidemenu css -->
<link href="assets/plugins/sidemenu/sidemenu.css" rel="stylesheet">
<!-- P-scroll bar css-->
<link href="assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />
<!---Icons css-->
<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet" />
<link href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet" />
<!-- Switcher css-->
<link id="theme" href="assets/skins/hor-skin/skin.html" rel="stylesheet" />
<link href="assets/switcher/css/switcher.css" rel="stylesheet" />
<link href="assets/switcher/demo.css" rel="stylesheet" />	
	<script src="assets/js/time-counter.js"></script>
	
	</head>

	<body class="app sidebar-mini dark-mode">
		
		<!-- Switcher -->
		<div class="switcher-wrapper">
			<div class="demo_changer">
				
			</div>
		</div>
		<!-- End Switcher -->
		
		<!---Global-loader-->
		<div id="global-loader" >
			<img src="images/logosb.png" style="width: 300px;height: 300px;margin-top:-200px;" alt="loader">
		</div>
		<div class="page">
			<div class="page-main">
				<div class="app-header header top-header">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="./">
								<img src="images/logosb.png" class="header-brand-img desktop-lgo" alt="Clont logo">
								<img src="images/logosb.png" class="header-brand-img dark-logo" alt="Clont logo">
								<img src="images/logosb.png" class="header-brand-img mobile-logo" alt="Clont logo">
								<img src="images/logosb.png" class="header-brand-img darkmobile-logo" alt="Clont logo">
							</a>
							<div class="dropdown   side-nav">
								<a aria-label="Hide Sidebar" class="app-sidebar__toggle nav-link icon mt-1" data-toggle="sidebar" href="#">
									<i class="fe fe-align-left"></i>
								</a><!-- sidebar-toggle-->
							</div>
						
							
							<div class="d-flex order-lg-2 ml-auto">
								
								<div class="dropdown ">
									<a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
										<span>
											  <?php foreach($param['header']['fotos'] as $fotos){ 
													if($fotos['fotos'] == ""){
												?>
												<img alt="" src="images/sem_foto.gif" class="avatar avatar-md brround">

												<?php }else{ ?>
													<img alt="" src="fotos/<?=$fotos['fotos'];?>" class="avatar avatar-md brround">

												<?php }} ?>
											
										</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<div class="text-center">
											<a href="#" class="dropdown-item text-center user pb-0"><?=$_SESSION['usuario'];?></a>
											<span class="text-center user-semi-title text-dark"></span>
											<div class="dropdown-divider"></div>
										</div>
										<a class="dropdown-item" href="dadospessoais">
											<i class="dropdown-icon mdi mdi-account-outline "></i> Dados Pessoais
										</a>
										<a class="dropdown-item" href="dadospagamento">
											<i class="dropdown-icon  mdi mdi-settings"></i> Dados de Pagamento
										</a>
										<a class="dropdown-item" href="minhasfotos">
											<i class="dropdown-icon mdi  mdi-message-outline"></i> Minhas Fotos
										</a>
										<a class="dropdown-item" href="seguranca">
											<i class="dropdown-icon mdi mdi-comment-check-outline"></i> Segurança
										</a>
										<a class="dropdown-item" href="sair">
											<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sair
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>