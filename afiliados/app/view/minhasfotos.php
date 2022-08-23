<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Minhas Fotos</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Minhas Fotos</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Minhas Fotos</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	
									 <div class="form-group" align="center" style="width:100%;">
                        <?php foreach($param['verfotos']['fotos'] as $fotos){
                        if($fotos['fotos'] == ""){
                            ?>
                                <img src="images/sem_foto.gif" class="img-responsive" alt="User" align="center">
                            <?php }else{ ?>
                                <img src="fotos/<?=$fotos['fotos'];?>" class="img-responsive" alt="User" align="center">
                        <?php }} ?>
                        </br>
                        <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="foto" class="form-control" style="width:30%;">
                        <input type="hidden" name="fotob" class="form-control">
                        </br>

                        <input type="submit"  class="btn btn-primary" value="ATUALIZAR">
                        </form>
					
				    </div>
								
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