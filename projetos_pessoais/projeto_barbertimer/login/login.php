
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/signin.css" rel="stylesheet">
    <title>Chamados</title>
  </head>
  <body class="text-center">

  <div class="row justify-content-center ">
  <div class="col-md-3">
   <form class="form-signin" method=post>
      <img class="mb-4" src="../img/barberquadrado.png"  width="150" height="150">
      <h1 class="h3 mb-3 font-weight-normal">Login Administrador</h1>
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" name=user class="form-control" placeholder="Usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name=pass class="form-control" placeholder="Senha" required>
    
      <button class="btn btn-lg btn-primary btn-block" type="submit" name=logar>Login</button>


    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
<?php 

if(isset($_POST['logar']))
{
	$usuario = $_POST['user'];
	$senha   = $_POST['pass'];
	
	include_once("../classes/funcoessql.php");
	$fsql = new funcoessql;
	$fsql->setconsulta("SELECT PKLOGIN, USUARIO, UPPER(DESC_PERFIL) as DESC_PERFIL, ATIVO 
	                    FROM PERFIL, LOGIN 
						WHERE PKPERFIL = FKPERFIL 
						  AND USUARIO = '$usuario' 
						  AND SENHA   = md5('$senha') ");
    

	if($fsql->total() > 0)
	{
		foreach($fsql->selecionar() as $s)
		{
			if($s['ATIVO'] == 1)
			{
				//criar e alimentar a session 
				$_SESSION['perfil'] = $s['DESC_PERFIL'];
				$_SESSION['nome']   = $s['USUARIO'];
				$_SESSION['logado'] = 'sim';
				$_SESSION['iduser'] = $s['PKLOGIN'];
				
				if($s['DESC_PERFIL'] == 'ADMINISTRADOR')
				{
					header("Location: /barbearia/adm");
					exit(); 
				}elseif($s['DESC_PERFIL'] == 'FUNCIONARIO' or $s['DESC_PERFIL'] == 'BARBEIRO' ){
					header("Location: /barbearia/funcionario");
					exit(); 
        }
			}else{
				echo "Usuário está inativo.";
			}
		}
	}else{
		 echo "
			         <div class='card bg-danger text-white'>
                      <div class='card-body'>Não encontrado</div>
                    </div>";
	}
}


?>

      <p class="mt-5 mb-3 text-muted">&copy; </p>
    </form>
    </div>
</div>
  </body>
</html>