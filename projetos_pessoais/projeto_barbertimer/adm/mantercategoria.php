<?php
include_once ("../classes/funcoessql.php");
include_once ("genericas.php");
?>

<div class="container mt-3">
  <h2>Manter Categoria</h2>
  <form method="post">
    <div class="form-group">
      <label for="categoria" class="form-label" style="width: 150px;" required>Informe a descrição:</label>
      <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Entre com a descrição">
    </div>
    <button type="submit" class="btn btn-primary" name="inserir">Inserir</button>
  </form>

  <?php
  if(isset($_POST['inserir'])) {
    $categoria = $_POST['categoria'];
  
    $inscat = new funcoessql;
    $inscat->setconsulta("insert into categoria values(null, '$categoria')");
    if($inscat->inserir() == 0) {
      msg("Inserido com Sucesso",1);
    }
  }	
  ?>

  <?php
  if(isset($_GET['excluir'])) {
    $categoria = $_GET['excluir'];

    $excluircat = new funcoessql;
    $excluircat->setConsulta("DELETE FROM categoria WHERE pkcategoria = $categoria");

    if($excluircat->excluir() == 0) {
      msg("Categoria excluído com sucesso", 1);
    }
  }
  ?>

  <div class="mt-3">
    <h5>Categorias</h5>

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
        $listar->setConsulta("select * from categoria order by 1 desc");

        if($listar->total() > 0) {
          foreach($listar->selecionar() as $l) {
            echo "<tr>
              <td>$l[0]</td>
              <td>$l[1]</td>
              <td><a href='?pg=mantercategoria&excluir=$l[0]'><button type='button' class='btn btn-danger'>Excluir</button></a></td>
            </tr>";
          }
        }
        ?>        
      </tbody>
    </table>
  </div>
</div>
