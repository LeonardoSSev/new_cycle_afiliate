
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Enviar Comprovante</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Enviar Comprovante</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Enviar Comprovante</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
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
                        <img src="comprovantes/<?=$documentos['comprovantes'];?>" width="200" height="200">
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
								<!-- table-wrapper -->
							</div>
							<!-- section-wrapper -->

							</div>
						</div>

					</div>
				</div><!-- end app-content-->
			</div>

     <?php include 'footer.php';?>