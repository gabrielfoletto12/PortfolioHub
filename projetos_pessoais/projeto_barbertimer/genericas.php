<?php 

function msg($texto, $tipo)
{
	$cores= array('primary','success','info','warning','danger','secondary','dark','light');
	echo "<div class='container mt-3'>
		 <div class='card bg-$cores[$tipo] text-white'>
		  <div class='card-body'>$texto</div>
		</div></div>";
}

function validasenha($senha)
{
	$ret     = false;
	$minus   = "abcdefghijklmnopqrstuvwxyz";
	$maisc   = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$caract  = "!\"#$%&*+,-./:;<=>?@[\]^_{|}~";
	$numero  = "0123456789"; 
	$contM=$contm=$contc=$contn=0;
	$vetor = str_split($senha);

	foreach($vetor as $v)
	{
		if(strpos($minus,$v) > -1)
		   $contm++;
		if(strpos($maisc,$v) > -1)
		   $contM++;
		if(strpos($caract,$v) > -1)
		   $contc++;
		if(strpos($numero,$v) > -1)+
		   $contn++;
	}
	if($contm >=1 and $contM >= 1 and $contc >=2 and $contn >=2)
       $ret = true;
	
	return $ret;
}

function movearquivo($nomefile)
{
	$tamanho       = 1024 * 1024 * 2;
	$ext_per       = array('jpg','jpeg','csv','pdf','doc','docx');
	$diretorio     = "../arq/";
	$nome_original = $_FILES[$nomefile]['name'];
	$nome          = explode(".",$_FILES[$nomefile]['name']);
	$ext           = $nome[count($nome)-1];
	$novo_nome     = "";
	$erros = array('Tudo certo','Tamanho muito grande do ini','Tamanho muito grande','Lido parcialmente','Sem arquivo','Pasta temporaria ausente','Sem premissão para gravar','Erro no php');

	if($_FILES[$nomefile]['size'] <= $tamanho)
	{
       if(in_array($ext, $ext_per))
	   {
            $novo_nome     = time().".".$ext;		   
			if(move_uploaded_file($_FILES[$nomefile]['tmp_name'],$diretorio.$novo_nome ))
			{
				
			}else{
				$novo_nome = "";
				
			}
	   }
	}
	
	return $novo_nome;
	
	
}
?>


