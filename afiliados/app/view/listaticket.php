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
		
		
		if(confirm('VOcê deseja fechar este ticket ?')){
			document.getElementById('idticket').value = n;
			document.getElementById('fechar').submit();	
		}
		
	}
</script>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Lista de Ticket</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Lista de Ticket</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Lista de Ticket <a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary text-white" style="float:right;color:white;">CRIAR NOVO TICKET</a></div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" >
										 <thead>
                                  			 <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Data</th>
                                                <th>Status</th>
                                                <th>Ações</th>
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
                                                    <div class='btn btn-danger'>Esperando Resposta</div>
                                                <?php }else if($pegastatus == '2'){ ?>
                                                    <div class='btn btn-warning'>Respondido</div>
                                                <?php }else if($pegastatus == '3'){ ?>
                                                    <div class='btn btn-success'>Fechado</div>
                                                 <?php }else if($pegastatus == '4'){ ?>
                                                    <div class='btn btn-success'>Fechado</div>
                                                <?php } ?>
                                                
                                                </td>
                                                <td>
                                               		 <a href="vertickets?i=<?=$ticket['cupom'];?>" class="btn btn-primary">VISUALIZAR</a>
                                                      	<?php  if($pegastatus == '0' || $pegastatus == '2'){ ?>
                                                             <a href="#" onclick="fecharticket('<?=$ticket['cupom'];?>')" class="btn btn-danger">FECHAR TICKET</a>
                                                        <?php } ?>
                                                    
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
                                                <th>Ações</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                   <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Novo Ticket</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                   <form action="" method="post">
                                    <div class="modal-body">
                                    <div class="form-group">
                                        <label >Assunto:</label>
                                        <input type="text" name="assunto"  class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label >Mensagem:</label>
                                        <textarea   class="form-control" name="mensagem" ></textarea>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" id="mandarmensagem" class="btn btn-primary">Mandar Mensagem</button>
                                    </div>
                                    </div>
										</form>
                                  


                                </div>
                                </div>

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