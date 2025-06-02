<?php 

class Conexao{
	private $endereco     = "localhost:3307";
	private $usuario      = "root";
	private $senha        = "senac";
	private $bd           = "barbearia";
	
	function __construct(){
		$this->conectar();
	}
	
	function conectar()
    {
      $con = mysqli_connect($this->endereco, $this->usuario, $this->senha, $this->bd);
      return $con;
	}	
}




?>