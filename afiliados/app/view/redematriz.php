<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?> 
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Rede Matriz</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Rede Matriz</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Rede Matriz</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	
									
									<div class="col-md-4">
                            <div class="card">
                                <div class="card-content wrapper">
                                    <form action="" method="post">
                                        <input type='hidden' name='buscar' value='1' />
                                        <div class="form-group" style="margin-left:1%;margin-top:1%;">
                                            <h5>Buscar por usuario <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <div class="input-group">
                                                    <input type="text"
                                                            class="form-control"
                                                            name="username"
                                                            placeholder="Entre com o Usuário..."
                                                            required>

                                                    <button type="submit" class="btn btn-success btn-search" type="button">Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                     
									
									<!--*************************
									*************************
									*************************
									 Contact Form Start
									*************************
									*************************
									*************************-->


                                    <div class="col-md-12" style="text-align:center;margin-left:1%;">
                           <?php if($_SESSION['userid'] !=  $param['verrede']['rede'][0]['userid']){ ?>
                            <form id="form-upbinario" action="" method="post">
                                <input type='hidden' name='up' value='1' />
                                <input name="idup" value="<?=$param['verrede']['rede'][0]['sponsorid'];?>" type="hidden">
                                <input name="upbinario" value="upbinario" type="hidden">
                                <a href="javascript:{}" onclick="document.getElementById('form-upbinario').submit(); return false;"  class="btn btn-danger" style="margin-left: -45px;">                                    
                                    <i class="fa fa-arrow-up"></i> NÍVEL ACIMA 
                                </a>
                            </form>
                                <?php } ?>
                        </div>

             
											
							<!-- Card end -->



                                    <script type='text/javascript' data-cfasync="false" src='https://www.google.com/jsapi'></script> 
            <script type='text/javascript' data-cfasync="false">

                google.load('visualization', '1', {packages: ['orgchart']});

                google.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = new google.visualization.DataTable();

                    data.addColumn('string', 'Name');

                    data.addColumn('string', 'Manager');

                    data.addColumn('string', 'ToolTip');

                    data.addRows([
						
						
						<?php 
						
						for($b=0;$b<=2000;$b++){
							
							if($b == '0'){
								if(empty($param['verrede']['rede'][$b]['cupom'])){break;}else{
						?>
							<?php if($param['verrede']['rede'][$b]['ativacao'] == '1'){ ?>
						
                           	[{v:'<?php print $param['verrede']['rede'][$b]['cupom']; ?>', f:'<div  class="node nivel-1" align="center" ><a  href="#" data-toggle="tooltip" data-html="true" title="Nome: <?=$param['verrede']['rede'][$b]['nome'];?>&#013;Email: <?=$param['verrede']['rede'][$b]['email'];?>&#013;Whatsapp: <?=$param['verrede']['rede'][$b]['whatsapp'];?>&#013;Fase: <?=$param['verrede']['rede'][$b]['fase'];?>"    onclick="rede(<?php print $param['verrede']['rede'][$b]['id']; ?>)"   ><div class="avatar" align="center" ></div></a><p class="nome" align="center"><?php print $param['verrede']['rede'][$b]['usuario']; ?></p></div>'},'', ''],
						
							<?php }else if($param['verrede']['rede'][$b]['ativacao'] != '1'){ ?>
						
								[{v:'<?php print $param['verrede']['rede'][$b]['cupom']; ?>', f:'<div  class="node nivel-1 pendente" align="center" ><a  href="#" data-toggle="tooltip" data-html="true" title="Nome: <?=$param['verrede']['rede'][$b]['nome'];?>&#013;Email: <?=$param['verrede']['rede'][$b]['email'];?>&#013;Whatsapp: <?=$param['verrede']['rede'][$b]['whatsapp'];?>&#013;Fase: <?=$param['verrede']['rede'][$b]['fase'];?>"    onclick="rede(<?php print $param['verrede']['rede'][$b]['id']; ?>)"   ><div class="avatar" align="center" ></div></a><p class="nome" align="center"><?php print $param['verrede']['rede'][$b]['usuario']; ?></p></div>'},'', ''],
						
							<?php } ?>
						<?php }}else{
						if(empty($param['verrede']['rede'][$b]['cupom'])){break;}else{
						?>
						<?php if($param['verrede']['rede'][$b]['ativacao'] == '1'){ ?>
         				 
						[{v:'<?php print $param['verrede']['rede'][$b]['cupom']; ?>', f:'<div  class="node nivel-1" align="center"><a  href="#"  data-ls-module="popover" data-trigger="hover" title="Nome: <?=$param['verrede']['rede'][$b]['nome'];?>&#013;Email: <?=$param['verrede']['rede'][$b]['email'];?>&#013;Whatsapp: <?=$param['verrede']['rede'][$b]['whatsapp'];?>&#013;Fase: <?=$param['verrede']['rede'][$b]['fase'];?>" onclick="rede(<?php print $param['verrede']['rede'][$b]['id']; ?>)" data-content="<p>Conteúdo do popover 3</p>" data-placement="left" ><div class="avatar" align="center" ></div></a><p class="nome" align="center"><?php print $param['verrede']['rede'][$b]['usuario']; ?></p></div>'}, '<?php print $param['verrede']['rede'][$b]['sponsorid']; ?>', ''],
						
						<?php }else if($param['verrede']['rede'][$b]['ativacao']  != '1' ){ ?>
						
						[{v:'<?php print $param['verrede']['rede'][$b]['cupom']; ?>', f:'<div  class="node nivel-1 pendente" align="center"><a  href="#"  data-ls-module="popover" data-trigger="hover" title="Nome: <?=$param['verrede']['rede'][$b]['nome'];?>&#013;Email: <?=$param['verrede']['rede'][$b]['email'];?>&#013;Whatsapp: <?=$param['verrede']['rede'][$b]['whatsapp'];?>&#013;Fase: <?=$param['verrede']['rede'][$b]['fase'];?>" onclick="rede(<?php print $param['verrede']['rede'][$b]['id']; ?>)" data-content="<p>Conteúdo do popover 3</p>" data-placement="left" ><div class="avatar" align="center" ></div></a><p class="nome" align="center"><?php print $param['verrede']['rede'][$b]['usuario']; ?></p></div>'}, '<?php print $param['verrede']['rede'][$b]['sponsorid']; ?>', ''],
						
						
							<?php } ?>
					
               
                  <?php }}}?>
					]);

                        var chart = new google.visualization.OrgChart(document.getElementById('rede'));

                chart.draw(data, {allowHtml: true, size: 'large'});

            }

</script>

            <div id="rede" style="overflow: auto;"></div>






                        </div>
                    </div>
        </div>
    </main>
<script>
    ///////////////////////////////////////////////// EDITAR SENHA //////////////////////////////////////////////////


function atualizarsenha(){

    document.getElementById("altera").innerHTML = '<button type="button" class="btn btn-primary d-block mt-3">Atualizando...</button>';

    senhaatual = document.getElementById('senhaatual').value;
    senha = document.getElementById('novasenha').value;
    csenha = document.getElementById('cnovasenha').value;

    if(senha != csenha){
        senhasnao();
       
    }else if(senhaatual == '' || senha == '' || csenha == ''){
        camposbranco();
       
    }else{

       

  var http = new XMLHttpRequest();

  var url = 'atualizarsenha.php';

  var params = 'senhaatual=' + senhaatual + '&novasenha=' + senha ;

  http.open( 'POST', url, true );


  //Send the proper header information along with the request

  http.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );


  http.onreadystatechange = function () { //Call a function when the state changes.

    if ( http.readyState == 4 && http.status == 200 ) {

        resultado = http.responseText;
        document.getElementById("altera").innerHTML = '<button type="button" onclick="atualizarsenha()" class="btn btn-primary d-block mt-3">ATUALIZAR SENHA</button>';
      
        if(resultado == '0'){
           erro();
        }else if(resultado == '1'){
            sucesso();
        }else if(resultado == '2'){
            atencao();
        }



    }

  }

  http.send( params );
    }
}

        function sucesso(){
        
            $('#alert_modal23').modal('show');    
        
        }

        function erro(){
        
         $('#alert_modal23').modal('show');    
    
        }

        function atencao(){
            
            $('#alert_modal23').modal('show');    
        
        }

        function senhasnao(){
            
            $('#alert_modal234').modal('show');    
        
        }

        function camposbranco(){
            
            $('#alert_modal2345').modal('show');    
        
        }

/////////////////////////////////////////////////////////////////////////////////////////////////////////
</script>

  <!---------------Alert moder3-------------->
  <div class='modal fade' id='alert_modal23' tabindex='-1' role='dialog' aria-hidden='true'>
                 <div class='modal-dialog' role='document'>
                     <div class='modal-content'>
                         <div class='modal-body'>
                             <div class='text-center m-t-30'>
                                 <img src='images/success.png' width='100' height='100' class='img-fluid' alt='info' />
                                 <h4 class='m-t-30 text-success'>Dados Atualizado com Sucesso </h4>
                               <!--  <p class='m-t-10'>You successfully read this important alert message.</p>-->
                             </div>
                         </div>
                         <div class='modal-footer d-inline text-center'>
                             <button type='button' class='btn btn-secondary' data-dismiss="modal" >Ok</button>
                            <!-- <button type='button' data-dismiss='modal' class='btn btn-success'>Continue</button>-->
                         </div>
                     </div>
                 </div>
             </div>


     <!---------------Alert moder3-------------->
     <div class='modal fade' id='alert_modal23' tabindex='-1' role='dialog' aria-hidden='true'>
             <div class='modal-dialog' role='document'>
                 <div class='modal-content'>
                     <div class='modal-body'>
                         <div class='text-center m-t-30'>
                             <img src='images/warning.png' width='100' height='100' class='img-fluid' alt='info' />
                                    <h4 class='m-t-30 text-warning'>Atenção</h4>
                                    <p class='m-t-10'>Houve problemas, tente novamente.</p>
                         </div>
                     </div>
                     <div class='modal-footer d-inline text-center'>
                         <button type='button' class='btn btn-secondary' data-dismiss="modal" >Ok</button>
                        <!-- <button type='button' data-dismiss='modal' class='btn btn-success'>Continue</button>-->
                     </div>
                 </div>
             </div>
         </div>

            <!---------------Alert moder3-------------->
            <div class='modal fade' id='alert_modal23' tabindex='-1' role='dialog' aria-hidden='true'>
                 <div class='modal-dialog' role='document'>
                     <div class='modal-content'>
                         <div class='modal-body'>
                             <div class='text-center m-t-30'>
                                 <img src='images/info.png' width='100' height='100' class='img-fluid' alt='info' />
                                        <h4 class='m-t-30 text-info'>Atenção</h4>
                                        <p class='m-t-10'>Senha Atual Incorreta !</p>
                             </div>
                         </div>
                         <div class='modal-footer d-inline text-center'>
                             <button type='button' class='btn btn-secondary' data-dismiss="modal" >Ok</button>
                            <!-- <button type='button' data-dismiss='modal' class='btn btn-success'>Continue</button>-->
                         </div>
                     </div>
                 </div>
             </div>

              <!---------------Alert moder3-------------->
            <div class='modal fade' id='alert_modal234' tabindex='-1' role='dialog' aria-hidden='true'>
                 <div class='modal-dialog' role='document'>
                     <div class='modal-content'>
                         <div class='modal-body'>
                             <div class='text-center m-t-30'>
                                 <img src='images/info.png' width='100' height='100' class='img-fluid' alt='info' />
                                        <h4 class='m-t-30 text-info'>Atenção</h4>
                                        <p class='m-t-10'>Senhas nao coincidem</p>
                             </div>
                         </div>
                         <div class='modal-footer d-inline text-center'>
                             <button type='button' class='btn btn-secondary' data-dismiss="modal" >Ok</button>
                            <!-- <button type='button' data-dismiss='modal' class='btn btn-success'>Continue</button>-->
                         </div>
                     </div>
                 </div>
             </div>

              <!---------------Alert moder3-------------->
            <div class='modal fade' id='alert_modal2345' tabindex='-1' role='dialog' aria-hidden='true'>
                 <div class='modal-dialog' role='document'>
                     <div class='modal-content'>
                         <div class='modal-body'>
                             <div class='text-center m-t-30'>
                                 <img src='images/info.png' width='100' height='100' class='img-fluid' alt='info' />
                                        <h4 class='m-t-30 text-info'>Atenção</h4>
                                        <p class='m-t-10'>Campos em branco, por favor preencha-os</p>
                             </div>
                         </div>
                         <div class='modal-footer d-inline text-center'>
                             <button type='button' class='btn btn-secondary' data-dismiss="modal" >Ok</button>
                            <!-- <button type='button' data-dismiss='modal' class='btn btn-success'>Continue</button>-->
                         </div>
                     </div>
                 </div>
             </div>




                        
     
<style>
#rede .google-visualization-orgchart-node {
    text-align: center;
    vertical-align: middle;
    font-family: inherit !important;
    cursor: default;
    border: none !important;
    -moz-border-radius: 0 !important;
    -webkit-border-radius: 0 !important;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    background: none !important;    
}

#rede .google-visualization-orgchart-noderow-large {
    height: 70px !important;
}

#rede .node {
    margin: 0 auto !important;
    width: 100px !important;
    text-align: center;    
}

#rede .node a {
    margin: 0 auto !important;
    padding: 0 !important;
}

#rede .avatar:hover {
    opacity: 0.8;    
}

#rede .avatar {
    margin: 0 auto !important;
    cursor: pointer;
}

#rede .node.empty .name {
    font-weight: normal;
}

#rede .node.empty .avatar {
    width: 42px;
    height: 42px;
    background: url('images/vazio.png') center center;
	background-size: 40px;
}

#rede .nivel-1 .avatar {
    width: 42px;
    height: 42px;
    background: url('images/faviconsb.png') no-repeat center center;
	background-size: 40px;
}




#rede .nivel-1.pendente .avatar {
    width: 42px;
    height: 42px;
    background: url('images/pendente.png') no-repeat center center;
	background-size: 40px;	
}

#rede .nivel-2.liberado .avatar {
    width: 42px;
    height: 42px;
    background: url('images/boneco.png') no-repeat center center; 
	background-size: 40px;
}

#rede .nivel-1.lista-negra .avatar {
    width: 42px;
    height: 42px;
    background: url('images/boneco.png') no-repeat center center;
}

#rede .nivel-liberado .avatar {
    width: 42px;
    height: 42px;
    background: url('images/boneco.png') no-repeat center center;
    background-size: 48px;
}

.node.completo .avatar {
    width: 42px;
    height: 42px;
    background: url('img/bronze.jpg') no-repeat center center !important;
    background-size: 30px !important;
}

#rede .nome {
    font-weight: normal;
	font-size: 12px;
	text-align:center;
}

</style>


<form action="" method="post" id="redey">

<input type="hidden" name="rede" value="1" />

<input type="hidden" name="cupom" id="cupom" />

</form>

<script>



function rede(i){

 

    document.getElementById( 'cupom' ).value = i;

    document.getElementById( 'redey' ).submit();

}

</script>
						
						
						
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