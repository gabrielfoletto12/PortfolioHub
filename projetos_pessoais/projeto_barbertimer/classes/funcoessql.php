<?php 
include_once("conexao.php");

class funcoessql extends Conexao{

private $consulta;
private $qry;
private $qtd;
private $l;
private $ret;
private $la;

//metodos acessores
function setConsulta($c)
{
	$this->consulta = $c;
}

function getConsulta(){
	return $this->consulta;
}
/**********************************/
//retorna a quantidade de linhas afetadas no select
function total(){
	
	$qry = mysqli_query($this->conectar(), $this->getConsulta());
	$qtd = mysqli_num_rows($qry);
	return $qtd;	
}

//retorna as linhas afetadas do select
function selecionar(){
	$qry = mysqli_query($this->conectar(), $this->getConsulta());	
	//converte o retorno o banco para um array php
	while($l=mysqli_fetch_array($qry))
	{
		$this->ret[] = $l;
	}
	return $this->ret;
}

//método responsável pelo insert
function inserir(){
	$qry = mysqli_query($this->conectar(), $this->getConsulta());
	$this->la = mysqli_affected_rows($this->conectar());
	return $this->la;
}

//retorna o ultimo id
function ultimo(){
	$c = $this->conectar();
	$qry = mysqli_query($c, $this->getConsulta());
	$this->la = mysqli_insert_id($c);
	return $this->la;
}

//metodo responsavel pela exclusao
function excluir(){
	$qry = mysqli_query($this->conectar(), $this->getConsulta());
	$this->la = mysqli_affected_rows($this->conectar());
	return $this->la;
}

//metodo responsavel pela alteracao
function alterar(){
	$qry = mysqli_query($this->conectar(), $this->getConsulta());
	$this->la = mysqli_affected_rows($this->conectar());
	return $this->la;
}	
	
}

?>