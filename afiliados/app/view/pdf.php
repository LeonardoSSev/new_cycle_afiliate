<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">PDF</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">PDF</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">PDF</div>
									<div class="card-options ">
										
									</div>
								</div>
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
								<!-- table-wrapper -->
							</div>
							<!-- section-wrapper -->

							</div>
						</div>

					</div>
				</div><!-- end app-content-->
			</div>

     <?php include 'footer.php';?>