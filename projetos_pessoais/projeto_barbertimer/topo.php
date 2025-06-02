<?php
session_start();
include_once("classes/funcoessql.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>BarberTimer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stlesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
  .navbar {
    height: 110px; /* Ajuste a altura da navbar conforme necessário */
    display: flex;
  }
  .navbar-brand img:hover {
    transform: scale(1.1); /* Aumenta o tamanho do ícone ao passar o mouse */
  }
  .navbar-brand {
    text-align: center;
    font-size: 16px;
    font-weight: bold;

  }

  .minha-div {
    font-family: 'Georgia', Serif;
   
  }
  body {
    background-color: #00000;
  }
  h1 {
    color: white;
    text-align: center;
  }
  li {
    font-size: 38px;
    font-family: 'verdana', Sans-serif;
   
  }
  .fixed-image {
    position: absolute;
    top: 5px; /* Ajuste a posição superior conforme necessário */
    left: 930px; /* Ajuste a posição esquerda conforme necessário */
    width: 120px; /* Ajuste a largura conforme necessário */
    height: 120px; /* Ajuste a altura conforme necessário */
    z-index: 1000; /* Certifique-se de que a imagem esteja acima de outros conteúdos */
  }
</style>
</head>

<body class="text-center ">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark position-relative">
  <div class="container-fluid minha-div">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="navbar-brand" href="?pg=inicial">INICIAL</a>
      </li>
      <li class="nav-item">
        <a class="navbar-brand" href="?pg=agendar">AGENDAR</a>
      </li>
      
    </ul>
    <ul class="navbar-nav" >
      
      <li class="nav-item">
        <a class="navbar-brand" href="https://www.instagram.com/gl_061_/?hl=pt-br">
          <img src="img/insta2.png" style="width:50px;" height="50">
        </a>
      </li>
      <li class="nav-item">
        <a class="navbar-brand" href="https://www.google.com/maps?q=Le+Quartier+Águas+Claras+Gallerie+%26+Bureau+-+Av.+Pau+Brasil,+10+-+Águas+Claras,+Brasília+-+DF,+71926-000&ftid=0x935a326e43400001:0xa1630dbaaeceb765&entry=gps&lucs=,94209835,94209837,94203325,47075489,94216425,94216401,94216395,47071704,47069508,47084304,94208458,94208447&g_ep=CAISDTYuMTA3LjMuNDk1NDAYACCs3wEqbCw5NDIwOTgzNSw5NDIwOTgzNyw5NDIwMzMyNSw0NzA3NTQ4OSw5NDIxNjQyNSw5NDIxNjQwMSw5NDIxNjM5NSw0NzA3MTcwNCw0NzA2OTUwOCw0NzA4NDMwNCw5NDIwODQ1OCw5NDIwODQ0N0ICQlI%3D">
          <img src="img/loc (2).png" style="width:50px;" height="50">
        </a>
      </li>
      <li class="nav-item">
        <a class="navbar-brand" href="login/login.php">
          <img src="img/user.png"  style="width:55px;" height="55">
        </a>
      </li>
    </ul>
  </div>
  <img src="img/barberfundo.png" class="fixed-image" alt="Barber Fundo">
</nav>

</body>
</html>
