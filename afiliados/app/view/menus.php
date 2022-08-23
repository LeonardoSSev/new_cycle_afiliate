	<!--aside open-->
				<aside class="app-sidebar">
					<div class="app-sidebar__user">
						<div class="dropdown user-pro-body text-center">
							<div class="user-pic">
								 <?php foreach($param['menu']['fotos'] as $fotos){ 
									if($fotos['fotos'] == ""){
								?>
								<img alt="" src="images/sem_foto.gif" class="avatar-xl rounded-circle mb-1">

								<?php }else{ ?>
									<img alt="" src="fotos/<?=$fotos['fotos'];?>" class="avatar-xl rounded-circle mb-1">

								<?php }} ?>
								
							</div>
							<div class="user-info">
								<h6 class=" mb-1 text-dark"><?=$_SESSION['usuario'];?></h6>
								
							</div>
						</div>
					</div>
					<ul class="side-menu">
						<li class="slide">
							<a class="side-menu__item"  href="./"><i class="side-menu__icon fe fe-monitor"></i><span class="side-menu__label">Painel</span></a>
						
						</li>
						
						<li class="slide">
							<a class="side-menu__item"  href="minharede"><i class="side-menu__icon fe fe-monitor"></i><span class="side-menu__label">Minha Rede</span></a>
						
						</li>
						
						<li class="slide">
							<a class="side-menu__item"   href="dadosrede"><i class="side-menu__icon fe fe-monitor"></i><span class="side-menu__label">Dados Upline</span></a>
						
						</li>
						
						
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Pagamentos</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a href="doacoesfeitas" class="slide-item"> Pagamentos Feitos</a></li>
								<li><a href="doacoesrecebidas" class="slide-item"> Pagamentos Recebidos</a></li>
								
							</ul>
						</li>
						
						<li class="slide">
							<a class="side-menu__item"  href="meusloginscpf"><i class="side-menu__icon fe fe-monitor"></i><span class="side-menu__label">Meus Logins</span></a>
						
						</li>
					
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-pie-chart"></i><span class="side-menu__label">Materiais</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a href="listavideos" class="slide-item">Vídeos</a></li>
								<li><a href="listapdf" class="slide-item">PDF/ APN</a></li>
								
							</ul>
						</li>
						
						<li class="slide">
							<a class="side-menu__item"   href="tickets"><i class="side-menu__icon fe fe-monitor"></i><span class="side-menu__label">Tickets</span></a>
						
						</li>
						
						<li class="slide">
							<a class="side-menu__item"  href="sair"><i class="side-menu__icon fe fe-monitor"></i><span class="side-menu__label">Sair</span></a>
						
						</li>
						
						
					</ul>
				</aside>
<!--aside closed-->