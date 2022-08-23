<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Ver Ticket</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Ver Ticket</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Ver Ticket</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	<?php foreach($param['ververticket']['verticket'] as $ticket){
						 $pegastatus = $user->pegaStatus($app->conexao,$ticket['cupom']);
							if($ticket['status'] == '2' || $ticket['status'] == '4'){
			 ?>
                        
                        
                        <div class="card d-inline-block mb-3 float-left mr-2">
                                <div class="position-absolute pt-1 pr-2 r-0">
                                    <span class="text-extra-small text-muted"><?=$new2 = date('d-m-Y H:i:s', strtotime($ticket['registro']));?></span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-row pb-2">
                                        <a class="d-flex" href="#">
                                            <img alt="" src="images/uss.png"
                                                class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                        </a>
                                        <div class=" d-flex flex-grow-1 min-width-zero">
                                            <div
                                                class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                                <div class="min-width-zero">
                                                    <p class="mb-0 truncate list-item-heading">Administrador</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="chat-text-left">
                                        <p class="mb-0 text-semi-muted">
                                        <?=$ticket['mensagem'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>


                            <?php } else if($ticket['status'] == '0' || $ticket['status'] == '3'){ ?>
                            

                            <div class="card d-inline-block mb-3 float-right  mr-2">
                                <div class="position-absolute pt-1 pr-2 r-0">
                                    <span class="text-extra-small text-muted"><?=$new2 = date('d-m-Y H:i:s', strtotime($ticket['registro']));?></span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-row pb-2">
                                        <a class="d-flex" href="#">
                                        <?php if($ticket['fotos'] == ''){ ?>
                        <img  alt="user" src="images/sem_foto.gif"  style="width:100px;" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall" alt="img">
                    <?php }else{?>
                        <img  alt="user"  style="width:100px;" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall" src="fotos/<?=$ticket['fotos'];?>" alt="img">
                    <?php } ?>
                                           
                                        </a>
                                        <div class="d-flex flex-grow-1 min-width-zero">
                                            <div
                                                class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                                <div class="min-width-zero">
                                                    <p class="mb-0 list-item-heading truncate"><?=$_SESSION['usuario'];?></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="chat-text-left">
                                        <p class="mb-0 text-semi-muted">
                                        <?=$ticket['mensagem'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="clearfix"></div>

                            <?php }} ?>  
                                </div>
								<!-- table-wrapper -->
								<div class="form-group mt-3 mb-0">
                                                <form action="" method="post">
                                                    <textarea class="form-control" rows="1" name="mensagem" placeholder="Digite sua Mensagem aqui..."></textarea>
                                                    <button type="submit" class="btn btn-primary btn-block">Mandar</button>
                                                </form>
  										</div>
							</div>
							<!-- section-wrapper -->
								
								

							</div>
						</div>

					</div>
				</div><!-- end app-content-->
			</div>

     <?php include 'footer.php';?>