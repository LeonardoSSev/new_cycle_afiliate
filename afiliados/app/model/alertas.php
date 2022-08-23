 <?php
 Class Alertas{

    public function AlertaStatus($pdo,$mensagem,$id,$link){
        
        if($id == '1'){

            $alerta =  print "
            
            <body onload='abre();'>
            <script>
             
             function abre(){
        
                 $('#alert_modal23').modal('show');    
                 }
            function redirecionarab(){
                window.location='$link';
            }
             </script>
              <!---------------Alert moder3-------------->
             <div class='modal fade' id='alert_modal23' tabindex='-1' role='dialog' aria-hidden='true'>
                 <div class='modal-dialog' role='document'>
                     <div class='modal-content'>
                         <div class='modal-body'>
                             <div class='text-center m-t-30'>
                                 <img src='images/success.png' style='width:100px;height:100px;' width='100' height='100' class='img-fluid' alt='info' />
                                 <h4 class='m-t-30 text-success'>$mensagem </h4>
                               <!--  <p class='m-t-10'>You successfully read this important alert message.</p>-->
                             </div>
                         </div>
                         <div class='modal-footer d-inline text-center'>
                             <button type='button' class='btn btn-secondary' onclick='redirecionarab()' >Ok</button>
                            <!-- <button type='button' data-dismiss='modal' class='btn btn-success'>Continue</button>-->
                         </div>
                     </div>
                 </div>
             </div>
             </body>
             ";


        }else if($id == '0'){

        $alerta =  print "

        <body onload='abre();'>
        <script>
         
         function abre(){
    
             $('#alert_modal23').modal('show');    
             }
        function redirecionarab(){
            window.location='$link';
        }
         </script>
          <!---------------Alert moder3-------------->
         <div class='modal fade' id='alert_modal23' tabindex='-1' role='dialog' aria-hidden='true'>
             <div class='modal-dialog' role='document'>
                 <div class='modal-content'>
                     <div class='modal-body'>
                         <div class='text-center m-t-30'>
                             <img src='images/warning.png' style='width:100px;height:100px;' width='100' height='100' class='img-fluid' alt='info' />
                                    <h4 class='m-t-30 text-warning'>Atenção</h4>
                                    <p class='m-t-10'>Houve problemas, tente novamente.</p>
                         </div>
                     </div>
                     <div class='modal-footer d-inline text-center'>
                         <button type='button' class='btn btn-secondary' onclick='redirecionarab()' >Ok</button>
                        <!-- <button type='button' data-dismiss='modal' class='btn btn-success'>Continue</button>-->
                     </div>
                 </div>
             </div>
         </div>
         </body>
         ";
        }else if($id == '2'){

            $alerta =  print "
    
            <body onload='abre();'>
            <script>
             
             function abre(){
        
                 $('#alert_modal23').modal('show');    
                 }
            function redirecionarab(){
                window.location='$link';
            }
             </script>
              <!---------------Alert moder3-------------->
             <div class='modal fade' id='alert_modal23' tabindex='-1' role='dialog' aria-hidden='true'>
                 <div class='modal-dialog' role='document'>
                     <div class='modal-content'>
                         <div class='modal-body'>
                             <div class='text-center m-t-30'>
                                 <img src='images/info.png' style='width:100px;height:100px;' width='100' height='100' class='img-fluid' alt='info' />
                                        <h4 class='m-t-30 text-info'>Atenção</h4>
                                        <p class='m-t-10'>$mensagem</p>
                             </div>
                         </div>
                         <div class='modal-footer d-inline text-center'>
                             <button type='button' class='btn btn-secondary' onclick='redirecionarab()' >Ok</button>
                            <!-- <button type='button' data-dismiss='modal' class='btn btn-success'>Continue</button>-->
                         </div>
                     </div>
                 </div>
             </div>
             </body>
             ";
            }
 
         return $alerta;
     }


 }

 ?>