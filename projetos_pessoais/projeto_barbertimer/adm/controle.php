<?php 

if(isset($_GET['pg']))
{
	$pag = $_GET['pg'];
}else{
	$pag = "";
}

switch($pag){
	case 'manterlogin':
	  include_once("manterlogin.php");
	break;
	case 'mantercategoria':
	  include_once("mantercategoria.php");
	break;
	case 'manterperfil':
		include_once("manterperfil.php");
	  break;
	case 'manterservico':
	  include_once("manterservico.php");
	break;
	default:
	  include_once("inicial.php");
	 break;
}

?>