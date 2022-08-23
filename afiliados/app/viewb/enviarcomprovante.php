

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Enviar Comprovante</h3>
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


							<!-- Card starts -->
							<div class="card">
								<div class="card-body">
									
									<!--*************************
									*************************
									*************************
									 Contact Form Start
									*************************
									*************************
									*************************-->



									<!-- Row start -->
									<div class="row justify-content-center gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                       
                                        <form action="" method="post" id="reentradas" enctype="multipart/form-data">
            
         
                   
                <?php
                      foreach($param['verdocumentos']['documentos'] as $documentos){ 
               
                    ?>
            <input type="hidden" name="reentradas" value="1">
            <div class="row" align="center">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                       <?php if($documentos['comprovantes'] == ''){ ?>
					 
                        <img src="images/sem_foto.gif" width="200" height="200">
                       <?php }else{ ?>
						<a href="comprovantes/<?=$documentos['comprovantes'];?>" target = "_blank">
                        <img src="comprovantes/<?=$documentos['comprovantes'];?>" width="500" height="500">
						</a>
                       <?php } ?>
                    </div>
                   
                   
                </div>
                </div>
               
                
                
                    <?php } ?>
                    <div class="row" align="center">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        
                        <input type="file" class="form-control"  name="foto" style="width:33%" id="textinput">
                    </div>
                   
           
                </div>
                </div>
                <div class="row" align="center">
                <div class="col-12 col-md-12">
                    
                    <div class="form-group">
                        
                        <input type="submit"  name="ok" class="btn btn-primary" value="MANDAR COMPROVANTE">
                    </div>

                </div>
                </div>
              
           
            </form>
                                            
										</div>
									</div>
									<!-- Row end -->



									<!--*************************
									*************************
									*************************
									 Contact Form End
									*************************
									*************************
									*************************-->

								</div>

							</div>
							<!-- Card ends -->
							
						</div>
					</div>
					<!-- Row end -->
					
				</div>
				<!-- END: .main-content -->

				<?php include 'footer.php';?>