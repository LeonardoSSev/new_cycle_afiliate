

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Lista de PDF</h3>
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
								<div class="card-header">Lista de PDF</div>
								<div class="card-body">
                                <?php foreach($param['verpdf']['pdf'] as $pdf){
								
                                ?>
                                    <!-- /.col -->
                                    <div class="col-md-12 col-lg-6">
                                      <div class="box box-default pull-up">
                                        <embed src="material/<?=$pdf['pdf'];?>" width="100%" height="100%" />
                                        <a href="material/<?=$pdf['pdf'];?>" class="btn btn-success" download>DOWNLOAD</a>
                                        <div class="box-body text-center">              
                                            <h4 class="box-title"><?=$pdf['titulo'];?></h4>
                                            <p class="box-text"><?=$pdf['descricao'];?></p>                
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