<?php 
if(isset($_GET['pg']))
{
	
	$pagina = $_GET['pg'];
}else{
	$pagina = "";
}
switch($pagina)
{
	case 'login':
	   include_once("login/login.php");
	break;
	case 'agendar':
		include_once("agendar.php");
	 break;
	case 'inicial':
		include_once("inicial.php");
	 break;
	default:
	   include_once("inicial.php");
	break;
}
?>