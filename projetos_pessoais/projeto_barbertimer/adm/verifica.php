<?php 

if(!isset($_SESSION['logado']))
{
	echo "<script> window.location.replace('../index.php'); </script>";
}else{
	if($_SESSION['perfil'] != 'ADMINISTRADOR')
	{
	  session_destroy();
	  echo "<script> window.location.replace('../index.php'); </script>";
	  
	}
}

?>