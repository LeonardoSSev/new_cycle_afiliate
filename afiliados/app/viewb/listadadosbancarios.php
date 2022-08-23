

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
				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Dados Bancários</h3>
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
                            <div class="card-header">Lista Dados Bancários   <span style="float:right;"> <a href="adddadosbancarios" class="btn btn-primary">ADICIONAR DADOS BANCÁRIOS</a></div>
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
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                       
                                        <table id="basicExample" class="table table-bordered">
                  						<thead>
				                        <tr>
				                            <th>#</th>
				                            <th>Banco</th>
				                            <th>Agência</th>
                                            <th>Conta</th>
											<th>Carteira</th>
                                            <th>Ações</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                <?php foreach($param['verdadosbancarios']['dadosbancarios'] as $usuarios){?>
								        <tr>
								
                                            <td><?= $usuarios['id'];?></td>
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