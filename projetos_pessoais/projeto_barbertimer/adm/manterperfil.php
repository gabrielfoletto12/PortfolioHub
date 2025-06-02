<?php
include_once ("../classes/funcoessql.php");
include_once ("genericas.php");
?>

<div class="container mt-3">
  <h2>Manter Perfil</h2>
  <form method="post">
    <div class="form-group">
      <label for="perfil" class="form-label" style="width: 150px;" required>Informe a descrição:</label>
      <input type="text" class="form-control" name="perfil" id="perfil" placeholder="Entre com a descrição">
    </div>
    <button type="submit" class="btn btn-primary" name="inserir">Inserir</button>
  </form>

  <?php
  if(isset($_POST['inserir'])) {
    $perfil = $_POST['perfil'];
  
    $insperf = new funcoessql;
    $insperf->setconsulta("insert into perfil values(null, '$perfil')");
    if($insperf->inserir() == 0) {
      msg("Inserido com Sucesso",1);
    }
  }	
  ?>

  <?php
  if(isset($_GET['excluir'])) {
    $perfil = $_GET['excluir'];

    $excluirperf = new funcoessql;
    $excluirperf->setConsulta("DELETE FROM perfil WHERE pkperfil = $perfil");

    if($excluirperf->excluir() == 0) {
      msg("Perfil excluído com sucesso", 1);
    }
  }
  ?>

  <div class="mt-3">
    <h5>Perfís</h5>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Descrição</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $listar = new funcoessql;
        $listar->setConsulta("select * from perfil order by 1 desc");

        if($listar->total() > 0) {
          foreach($listar->selecionar() as $l) {
            echo "<tr>
              <td>$l[0]</td>
              <td>$l[1]</td>
              <td><a href='?pg=manterperfil&excluir=$l[0]'><button type='button' class='btn btn-danger'>Excluir</button></a></td>
            </tr>";
          }
        }
        ?>        
      </tbody>
    </table>
  </div>
</div>