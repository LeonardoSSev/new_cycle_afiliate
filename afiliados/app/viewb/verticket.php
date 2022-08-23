
<?php
$app = new App();
$user = $app->loadModel("Bancarios");

?>
				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Ver Ticket</h3>
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
							<div class="card m-0">
								<!-- Row start -->
								<div class="row no-gutters">
									
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-9">
										<div class="selected-user">
											<span>Assunto: <span class="name"><?=$param['ververticket']['verticket'][0]['assunto'];?></span></span>
                                        </div>
                                        
                                        
										<div class="chat-container">
											<ul class="chat-box chatContainerScroll">
                                            <?php foreach($param['ververticket']['verticket'] as $ticket){
                                                $pegastatus = $user->pegaStatus($app->conexao,$ticket['cupom']);
                                                    if($ticket['status'] == '2' || $ticket['status'] == '4'){
                                            ?>

                                            <li class='chat-left'>
                                                <div class='chat-avatar'>
                                                <?php if($ticket['fotos'] == ''){ ?>
                                                    <img  alt="user" src="images/sem_foto.gif"  class="avatar" alt="img">
                                                <?php }else{?>
                                                    <img  alt="user" src="fotos/<?=$ticket['fotos'];?>"  class="avatar" alt="img">
                                                <?php } ?>
                                                  
                                                    <div class='chat-name'>Administração</div>
                                                </div>
                                                <div class='chat-text'><?=$ticket['mensagem'];?></div>
                                                <div class='chat-hour'><?=$new2 = date('d-m-Y H:i:s', strtotime($ticket['registro']));?> <span class='icon-done_all'></span></div>
                                            </li>
                                            <?php } else if($ticket['status'] == '0' || $ticket['status'] == '3'){ ?>

                                            <li class='chat-right'>
                                                <div class='chat-hour'><?=$new2 = date('d-m-Y H:i:s', strtotime($ticket['registro']));?><span class='icon-done_all'></span></div>
                                                <div class='chat-text'><?=$ticket['usuario'];?><br />
                                                <?=$ticket['mensagem'];?></div>
                                                <div class='chat-avatar'>
                                                <?php if($ticket['fotos'] == ''){ ?>
                                                    <img  alt="user" src="images/sem_foto.gif"  class="avatar" alt="img">
                                                <?php }else{?>
                                                    <img  alt="user" src="fotos/<?=$ticket['fotos'];?>"  class="avatar" alt="img">
                                                <?php } ?>
                                                    <div class='chat-name'>Você</div>
                                                </div>
                                            </li>
                                            <?php }} ?>   
                                                
											</ul>
											<div class="form-group mt-3 mb-0">
                                                <form action="" method="post">
                                                    <textarea class="form-control" rows="1" name="mensagem" placeholder="Digite sua Mensagem aqui..."></textarea>
                                                    <button type="submit" class="btn btn-primary btn-block">Mandar</button>
                                                </form>
  										</div>
                                        </div>
                                        

									</div>
								</div>
								<!-- Row end -->
							</div>
						</div>
					</div>
					<!-- Row end -->
					
				</div>
				<!-- END: .main-content -->

			<?php include 'footer.php';?>