
<?php
include_once("../classes/funcoessql.php");
include_once("genericas.php");
?>



<?php
       if(isset($_GET['excluir'])) {
       $idagend = $_GET['excluir'];
    
      $excluiragend = new funcoessql;
      $excluiragend->setConsulta("DELETE FROM agendamento WHERE pkagend = '$idagend'");
    
    
        if($excluiragend->excluir() == 0) {
          
            msg("Agendamento excluído com sucesso", 1);
        }
    }
    ?>


<div class="container mt-3"> 
  <h2>Informe a Data:</h2>
  <div class="mb-3 mt-3">
    <form method="post">
        <label class="form-label">Informe a Data:</label>
        <input type="date" class="form-control" name="data" required placeholder="Informe a data">
  
        <label for="sel1" class="form-label">Selecione o Profissional:</label>
        <select class="form-select" id="sel1" name="profissional">
            <option value="">Selecione uma opção</option>
            <?php
            $listabar = new funcoessql;
            $listabar->setconsulta("select pklogin, nome from login, perfil where fkperfil = pkperfil and desc_perfil = upper('BARBEIRO')");
            if ($listabar->total() > 0) {
                foreach ($listabar->selecionar() as $b) {
                    echo "<option value=$b[0]>$b[1]</option>";
                }
            }
            ?>
        </select>
       <br> <button type="submit" class="btn btn-success" name="listar">Listar</button>
    </form>
  </div>
</div>

<?php

if(isset($_POST['listar'])) 
{
  $data = $_POST['data'];
  $_SESSION['data'] = $_POST['data'];
  
  
    
  
      $listalogin = new funcoessql;
      $listalogin->setconsulta("select hora_comeco, desc_categoria, desc_servico, preco, pkagend
      from agendamento, categoria, servico
       where agendamento.fkcategoria = pkcategoria 
       and fkservico = pkservico
       and data_agendamento = '$data'");
       
		if($listalogin->total() > 0)
		 {
       echo  "
      <div class='container mt-3'>
		  <h2>Horários de Hoje</h2>
		  
		  <table class='table table-striped'>
			<thead>
			  <tr>
				<th>Horário</th>
				<th>Categoria</th>
				<th>Serviço</th>
				<th>Preço</th>
        <th>Ações</th>

			  </tr>
			</thead>
			<tbody>";
    
		
			foreach($listalogin->selecionar() as $lt)
			{
          $pkagend = $lt[4];
               echo "
			    <tr>
				  <td>$lt[0]</td>
				  <td>$lt[1]</td>
				  <td>$lt[2]</td>
				  <td>$lt[3]</td>
         
					  </a>
            </td>
            <td><a href='?pg=agendamento&excluir=$pkagend'><button type='button' class='btn btn-danger'>Excluir</button></a>
            
            <button type='button' class='btn btn-primary' data-bs-toggle='popover' title='Informações do cliente:' data-bs-content='";
          
              $listainfo = new funcoessql;
              $listainfo->setconsulta("select primeiro_nome, telefone, email from agendamento where pkagend = $pkagend");
                  if($listainfo->total() > 0)
                  {
                  foreach($listainfo->selecionar()as $lg)
                   {
                  $nome = $lg[0];
                  $telefone = $lg[1];
                  $email = $lg[2];
                  $_SESSION['nome'] = $nome;
                  $_SESSION['telefone'] = $telefone;
                  $_SESSION['email'] = $email;
                   }
                }              
                echo $nome;
                echo $telefone;
                echo $email;

                
                              
            echo "'>Ver</button></td>
              </tr>";

			}
    }
   
  }
?>

<script>
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
</script>

