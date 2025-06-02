<?php 
include_once("../classes/funcoessql.php");
include_once("genericas.php");


?>
<div class="container mt-3"> 
  <h2>Manter Login</h2>
<form method=post>
  <div class="mb-3 mt-3">
    <label class="form-label">Nome:</label>
    <input type="text" class="form-control" name="nome" minlength=2 required placeholder="Digite o nome" >
  </div>
  <div class="mb-3 mt-3">
    <label class="form-label">Usuário:</label>
    <input type="text" class="form-control" name="usuario" required  placeholder="Informe o usuario" >
  </div>
 
  <div class="mb-3">
    <label for="pwd" class="form-label">Senha:</label>
    <input type="password" class="form-control" name="senha" minlength=8 maxlength=16 required  placeholder="Digite a senha" >
  </div>
  
  <div class="mb-3">
    <label for="sel1" class="form-label">Escolha o Perfil:</label>
    <select class="form-select" id="sel1" name="perfil">
      <?php 
	$listaper = new funcoessql;
	$listaper->setconsulta("select * from perfil order by 2");
	if($listaper->total() > 0)
	{
		foreach($listaper->selecionar() as $p)
		{
		  echo "<option value=$p[0]>$p[1]</option>";	
		}
	  
	}
    ?>
    </select>
</div>

<label for="browser" class="form-label">Escolha do CEP na lista</label> 
<input class="form-control" list="browsers" name="idcep" id="browser">

<datalist id="browsers">
<?php
$cep = new funcoessql;
$cep->setConsulta("select pkcep, concat(cep,' ',logradouro,' ',complemento,' ',bairro,' ',cidade,' ',estado) completo from cep");
if($cep->total() > 0)
{
	foreach($cep->selecionar() as $c)
	{
		echo "<option value=$c[0]>$c[1]</option>";
	}
}

?>
</datalist> 
 

 <div class="mb-3 mt-3">
   <label for="appt">Escolha os dias de trabalho:</label>
      <div class="form-group">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="dias[]" id="seg" value="seg">
          <label class="form-check-label" for="seg">Segunda</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="dias[]" id="ter" value="ter">
          <label class="form-check-label" for="ter">Terça</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="dias[]" id="qua" value="qua">
          <label class="form-check-label" for="qua">Quarta</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="dias[]" id="qui" value="qui">
          <label class="form-check-label" for="qui">Quinta</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="dias[]" id="sex" value="sex">
          <label class="form-check-label" for="sex">Sexta</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="dias[]" id="sab" value="sab">
          <label class="form-check-label" for="sab">Sábado</label>
        </div>
		<div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="dias[]" id="dom" value="dom">
          <label class="form-check-label" for="dom">Domingo</label>
        </div>
 </div>
     
	  
<div class="mb-3 mt-3">
<label for="appt">Horario Inicial:</label>
<input type="time" name="hora_inicial" >
</div>
<div class="mb-3 mt-3">
<label for="appt">Horario Final:</label>
<input type="time"  name="hora_final"  >
</div>
<div class="mb-3 mt-3">
<label for="appt">Intervalo:</label>
<input type="time"  name="hora_intervalo" >
</div>
      
    
  </div>
<button type="submit" class="btn btn-primary" name='cadastrar'>Cadastrar</button>
</div>
</form> 

<?php

  msg("Perfis de ADM data e horário são opcionais.",2);
if(isset($_POST['cadastrar']))
{
		$dias_semana_selecionados = $_POST['dias'];
		$dias_semana_string = implode("/", $dias_semana_selecionados);
	
		$nome         = $_POST['nome'];
		$usuario      = $_POST['usuario'];
		$senhainfo    = $_POST['senha'];
		$idcep        = $_POST['idcep'];
		$intervalo =   $_POST['hora_intervalo'];
		$inicial  =   $_POST['hora_inicial'];
		$final = $_POST['hora_final'];
		$perfil       = $_POST['perfil'];
	
		

		if(!empty(trim($nome)) and !empty(trim($usuario)))
		{
			$verifica = new funcoessql;
			$verifica->setconsulta("select pklogin from login where usuario = '$usuario'");
			if($verifica->total() > 0)
			{
				msg("Usuário ja existe",4);		
			}else{
				
				if(strlen(trim($senhainfo)) > 10 and strlen(trim($senhainfo)) < 17)
				{
					if(validasenha($senhainfo))
					{
						
							//CRIAR
							$inslogin = new funcoessql;
							$inslogin->setconsulta("insert into login values(null,'$usuario','$nome',md5('$senhainfo'),1,'$dias_semana_string','$intervalo','$inicial','$final',$idcep,'$perfil')");
							
							if($inslogin->inserir() == 0)
							{
								msg("Inserido com sucesso",1);
								
							}else
							{
								msg("Erro ao inserir",4);
							}//inserir
							
						
					}else
					{
						msg("Senha não atende aos critérios",4);		
					}
				}else{
					msg("Tamanho da senha inválida",4);	
				}
			}
		}else{
			msg("Preencha todos os campos",4);	
		}	
}	
	
	
	


  
?>



