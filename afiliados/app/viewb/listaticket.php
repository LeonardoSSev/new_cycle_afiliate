
<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
<form action="" method="post" id="fechar">
<input type="hidden" name="idticket" id="idticket" />
<input type="hidden" name="fecharticket" value="1" />
</form>
<script>
	function fecharticket(n){
		
		
		if(confirm('Deseja fechar este ticket ?')){
			document.getElementById('idticket').value = n;
			document.getElementById('fechar').submit();	
		}
		
	}
</script>
				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Tickets</h3>
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
								<div class="card-header">Tickets   <div class="buttons"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="float:right;">CRIAR NOVO TICKET</a></div></div>
								<div class="card-body">
									<table id="basicExample" class="table table-bordered">
                                    <thead>
                          <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Data</th>
                                                <th>Status</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($param['verlistaticket']['listaticket'] as $ticket){ 
											$pegastatus = $user->pegaStatus($app->conexao,$ticket['cupom']);
										?>
                                            <tr>
                                                <td><?=$ticket['id'];?></td>
                                                <td><?=$ticket['assunto'];?></td>
                                                <td><?=$ticket['registro'];?></td>
                                                <td>
                                                <?php if($pegastatus == '0'){ ?>
                                                    <div class='btn btn-warning'>Aguardando Resposta</div>
                                                <?php }else if($pegastatus == '2'){ ?>
                                                    <div class='btn btn-success'>Respondida</div>
                                                <?php }else if($pegastatus == '3'){ ?>
                                                    <div class='btn btn-danger'>Fechada</div>
                                                 <?php }else if($pegastatus == '4'){ ?>
                                                    <div class='btn btn-danger'>Fechada</div>
                                                <?php } ?>
                                                
                                                </td>
                                                <td>
                                                <div class="buttons">
                                                <a href="vertickets?i=<?=$ticket['cupom'];?>" class="btn btn-info">VISUALIZAR</a>
                                                <?php  if($pegastatus == '0' || $pegastatus == '2'){ ?>
                                                             <a href="#" onclick="fecharticket('<?=$ticket['cupom'];?>')" class="btn btn-danger">FECHAR TICKET</a>
                                                        <?php } ?>
                                                  </div>
                                                </td>
                                            </tr>
                                        <?php } ?>    
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Data</th>
                                                <th>Status</th>
                                                <th>Ação</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    
                                    <div class="modal fade" style="margin-top:5%;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Novo Ticket</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="" id="mandar">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Assunto:</label>
                                                        <input type="text" name="assunto" class="form-control" id="recipient-name1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text"  class="control-label">Mensagem:</label>
                                                        <textarea class="form-control" name="mensagem" id="message-text1"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="waves-effect waves-green btn-flat modal-action modal-close" data-dismiss="modal">Fechar</button>
                                                <button type="button" id="mandarmensagem" class="btn btn-primary">Mandar Mensagem</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

 <script>
            document.getElementById("mandarmensagem").addEventListener("click", function(){
                document.getElementById("mandar").submit();
            });

  </script>
  
								</div>
							</div>
						</div>
					</div>
					<!-- Row ends -->

					
					
				</div>
				<!-- END: .main-content -->

				<?php include 'footer.php';?>