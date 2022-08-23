

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Lista de Vídeo</h3>
								</div>
							</div>
							
						</div>
					</div>
				</header>
				<!-- END: .page-header -->

				<!-- BEGIN .main-content -->
				<div class="main-content">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">Lista de Vídeo</div>
								<div class="card-body">
								<?php foreach($param['vervideo']['video'] as $video){
								
								?>
									<!-- /.col -->
									<div class="col-md-12 col-lg-6">
									  <div class="box box-default pull-up">
										 <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?=$video['link'];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
										<div class="box-body text-center">              
											<h4 class="box-title"><?=$video['titulo'];?></h4>
											<p class="box-text"><?=$video['descricao'];?></p>
										</div>
										<!-- /.box-body -->
									  </div>
									  <!-- /.box -->
									</div>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<!-- Row ends -->

					
					
				</div>
				<!-- END: .main-content -->

				<?php include 'footer.php';?>