<?php
include_once("../classes/funcoessql.php");
include_once("genericas.php");
?>


<div class="container mt-3">
    <h2>Manter Serviço</h2>
    <form method="post">
        <div class="form-group">
            <label for="servico">Descrição do Serviço:</label>
            <input type="text" class="form-control" name="servico" required placeholder="Entre com a descrição">
        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" class="form-control" step="0.01" min="0" max="999.99" name="preco" id="preco" required>
        </div>

        <div class="form-group">
            <label for="categoria">Escolha a Categoria:</label>
            <select class="form-control" id="categoria" name="categoria">
                <?php
                $listcat = new funcoessql;
                $listcat->setconsulta("select * from categoria order by 2");
                if ($listcat->total() > 0) {
                    foreach ($listcat->selecionar() as $c) {
                        echo "<option value='$c[0]'>$c[1]</option>";
                    }
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="inserir">Inserir</button>

        <?php
        if (isset($_POST['inserir'])) {
            $categoria = $_POST['categoria'];
            $servico = $_POST['servico'];
            $preco = $_POST['preco'];

            $insserv = new funcoessql;
            $insserv->setconsulta("insert into servico values(null,'$servico',$categoria,$preco)");
            if ($insserv->inserir() == 0) {
                msg("Inserido com Sucesso", 1);
            }
        }
        ?>

       <?php
       if(isset($_GET['excluir'])) {
       $servico = $_GET['excluir'];
    
      $excluirserv = new funcoessql;
      $excluirserv->setConsulta("DELETE FROM servico WHERE pkservico = $servico");
    
    
        if($excluirserv->excluir() == 0) {
          
            msg("Serviço excluído com sucesso", 1);
        }
    }
    ?>

        <div class="mt-3">
            <h5>Tabela De Serviços</h5>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id Serviço</th>
                    <th>Categoria</th>
                    <th>Serviço</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $listar = new funcoessql;
                $listar->setConsulta("select pkservico, desc_categoria, desc_servico , preco
                                      from servico, categoria 
                                      where fkcategoria = pkcategoria
                                      order by 1 desc");

                if ($listar->total() > 0) {
                    foreach ($listar->selecionar() as $l) {
                        echo "<tr>
				<td>$l[0]</td>
				<td>$l[1]</td>
        <td>$l[2]</td>
        <td>$l[3]</td>
				
				<td><a href='?pg=manterservico&excluir=$l[0]'><button type='button' class='btn btn-danger'>Excluir</button></a></td>
			  </tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    
</div>


