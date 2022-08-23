<body onload="abre();">
<?php


$alerta = $mensagem;
if($sucesso == '1'){
	
?>

 <script>

 	 function redireciona(){
      
		window.location = window.location.href;
	}

   function abre(){
   
   $('#alert_modal23').modal('show');    
   }
	


</script>



     <!---------------Alert moder3-------------->
                <div class="modal fade" id="alert_modal23" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center m-t-30">
                                    <img src="img/users/success.png" width="100" height="100" class="img-fluid" alt="info" />
                                    <h4 class="m-t-30 text-success"><?php print $alerta;?> </h4>
                                  <!--  <p class="m-t-10">You successfully read this important alert message.</p>-->
                                </div>
                            </div>
                            <div class="modal-footer d-inline text-center">
                                <button type="button" class="btn btn-secondary" onclick="redirecionarab()" >Ok</button>
                               <!-- <button type="button" data-dismiss="modal" class="btn btn-success">Continue</button>-->
                            </div>
                        </div>
                    </div>
                </div>
<?php } else if($erro == '1'){ ?>
 <script>
   function abre(){
	  
    $('#alert_modal43').modal('show');    
   }
 
	function redireciona(){
		//var url_atual = window.location.href;
		window.location =  window.location.href;
	}

</script>



    
                <div class="modal fade" id="alert_modal43" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center m-t-30">
                                    <img src="img/users/warning.png" width="100" height="100" class="img-fluid" alt="info" />
                                    <h4 class="m-t-30 text-warning">Atenção</h4>
                                    <p class="m-t-10">Houve problemas, tente novamente.</p>
                                </div>
                            </div>
                            <div class="modal-footer d-inline text-center">
                                <button type="button" class="btn btn-secondary" onclick="redireciona()" data-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>

<?php }else if($cuidado == '1'){ ?>
	
	<script>
   function abre(){
	  
    $('#alert_modal43').modal('show');    
   }
 
	 function redireciona(i){
       var j;
		//var url_atual = window.location.href;
        if(i == '1'){
            j = 'index.php?view=passfinanceira';
        }else if(i == '10'){
            j = 'index.php?view=faturasp';
        }else{
            j =  window.location.href;
        }
		window.location = j;
	}

</script>



    
                <div class="modal fade" id="alert_modal43" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center m-t-30">
                                    <img src="img/users/info.png" width="100" height="100" class="img-fluid" alt="info" />
                                    <h4 class="m-t-30 text-info">Atenção</h4>
                                    <p class="m-t-10"><?php print $alerta;?>.</p>
                                </div>
                            </div>
                            <div class="modal-footer d-inline text-center">
                                <button type="button" class="btn btn-secondary" onclick="redireciona(<?php print $direcao;?>)" data-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>

<?php } ?>
</body>
