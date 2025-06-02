<?php 

if(isset($_GET['pg']))
{
	$pag = $_GET['pg'];
}else{
	$pag = "";
}

switch($pag){
	case 'agendamento':
	  include_once("agendamento.php");
	break;
	
}

?>