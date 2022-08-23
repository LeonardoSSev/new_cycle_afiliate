<?php session_start();

 $id = intval($_POST['invoice']);
 $a = intval($_POST['a']);
 $d = intval($_POST['d']);
  			
			if(!isset($_SESSION['carrinhointerno'][$_SESSION['userid']][$id])){
				
				if($a == '1'){
               $_SESSION['carrinhointerno'][$_SESSION['userid']][$id] = 1;
				}
            }else{
				if($a == '1'){
               		$_SESSION['carrinhointerno'][$_SESSION['userid']][$id] += 1;
				}else if($d == '1'){
					$_SESSION['carrinhointerno'][$_SESSION['userid']][$id] -= 1;
				}
            }
 
 ?>
		