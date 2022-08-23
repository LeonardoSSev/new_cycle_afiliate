<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Vídeo</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Vídeo</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Vídeo</div>
									<div class="card-options ">
										
									</div>
								</div>
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
								<!-- table-wrapper -->
							</div>
							<!-- section-wrapper -->

							</div>
						</div>

					</div>
				</div><!-- end app-content-->
			</div>

     <?php include 'footer.php';?>