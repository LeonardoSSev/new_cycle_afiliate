<?php
$app = new App();
$user = $app->loadModel("Bancarios");

$pegavalor = $user->pegaFaturasvalor($app->conexao,$_SESSION['idfaturab']);

?> 
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Pagamento Ethereum</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Pagamento Ethereum</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Pagamento Ethereum</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	                            <form action="" method="post"  enctype="multipart/form-data">
                                <input type="hidden" name="idfatura" value="<?=$_SESSION['idfaturab'];?>">
                                <input type="hidden" name="valor" value="<?=$_SESSION['valores'];?>">
                                <div class="card-body" align="center">
                                    <h4 class="card-title" >Faça o pagamento em Ethereum</h4>
                                </div>
                                <hr>
                                <div class="form-body" align="center">
                                    <div class="card-body">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
											<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=bitcoin:<?=$param['verbitcoin']['bitcoin'] ?>?amount=<?= $valor = number_format($pegavalor, 8, '.', ''); ?>&choe=UTF-8" class="img-responsive">
                                             <p style=" margin-top:1%;"> <?=$param['verbitcoin']['bitcoin'];?></p>
                                              <p  ><?=$valor = number_format($pegavalor, 8, '.', '');?></p>
									</div>

                                 
                                          
                             
                                   
                                    </div>
                                    <hr>
                                   
                                    <div class="form-actions" align="center">
                                        <div class="card-body">
                                          <!--  <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Mandar Comprovante</button>-->
                                           
                                        </div>
                                    </div>
                                </div>
                            </form>
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