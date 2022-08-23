<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
<form action="" method="post" id="excluir">
<input type="hidden" name="exclusao" value="1">
<input type="hidden" name="idexcluir" id="idexcluir" >
</form>
<script>
    function excluir(i){
        document.getElementById('idexcluir').value = i;
		if(confirm('Você deseja excluir este registro ?')){

			document.getElementById('excluir').submit();

		}
	
    }
	
</script>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Lista Dados Bancários</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Lista Dados Bancários</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Lista Dados Bancários  &nbsp;&nbsp; <span style="float:right;color:white;"> <a href="adddadosbancarios" class="btn btn-primary text-white">ADICIONAR DADOS BANCÁRIOS</a></div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" >
										 <thead>
				                        <tr>
				                         
				                            <th>Banco</th>
				                            <th>Agência</th>
                                            <th>Conta</th>
											<th>Carteira</th>
											<th>Pic Pay</th>
                                            <th>Ações</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                <?php foreach($param['verdadosbancarios']['dadosbancarios'] as $usuarios){?>
								        <tr>
								
                                           
                                            <td><?= $usuarios['banco'];?></td>
				                            <td><?= $usuarios['agencia'];?></td>
                                            <td><?= $usuarios['conta'];?></td>
											<?php if($usuarios['banco'] == 'bitcoin'){ ?>
												<td><?= $usuarios['bitcoin'];?></td>
											<?php }else if($usuarios['banco'] == 'ethereum'){ ?>
												<td><?= $usuarios['ethereum'];?></td>
											<?php }else if($usuarios['banco'] == 'litecoin'){ ?>
												<td><?= $usuarios['litecoin'];?></td>
											<?php }else{ ?>
											<td></td>
											
											<?php } ?>
											<td><?= $usuarios['picpay'];?></td>
											<td>
												<a href="editardadosbancarios?i=<?= $usuarios['id'];?>" class="btn btn-primary">EDITAR</a>
												<a href="#" onclick="excluir(<?= $usuarios['id'];?>)" class="btn btn-danger text-white">EXCLUIR</a>
											</td>
								
				                        </tr>
				                <?php } ?>       
				                    </tbody>
				                </table>
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