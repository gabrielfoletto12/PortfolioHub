<?php 
session_start();
//include_once("verifica.php");
?>

<head>
  <title>Área Administrativa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    /* Estilo para centralizar os itens da navbar */
    .navbar-nav {
      margin: auto;
    }

    /* Estilo para alterar o formato e tamanho das letras na navbar */
    .nav-link {
      font-size: 18px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
      <li class="nav-item">
        <a class="navbar-brand" href="sair.php">
          <img src="img/user.png"  style="width:55px;" height="55">
        </a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="?pg=manterservico">Manter Serviço</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pg=mantercategoria">Manter Categoria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pg=manterperfil">Manter Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pg=manterlogin">Manter Login</a>
        </li>
      
      </ul>
    </div>
  </nav>
</body>

