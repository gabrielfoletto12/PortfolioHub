
<style>
/* Estilo para o botão fixo na parte inferior */
.fixed-bottom-button {
  position: fixed;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 1000; /* Garante que o botão esteja sempre à frente */
}

/* Carrossel com tamanho fixo */
.carousel {
  margin-top: 0; /* Remove qualquer margem superior */
  height: 550px !important; /* Define a altura fixa do carrossel */
  overflow: hidden; /* Garante que o conteúdo que ultrapassa o tamanho fixo seja escondido */
}

/* Ajusta as imagens do carrossel para se adequarem ao tamanho fixo */
.carousel-inner img {
  filter: blur(1px); /* Aplica o desfoque nas imagens do carrossel */
  -webkit-filter: blur(3px); /* Compatibilidade com navegadores webkit */
  width: 100%; /* Garante que a imagem ocupe 100% da largura do carrossel */
  height: 100% !important; /* Garante que a imagem ocupe 100% da altura do carrossel, sem ser afetada pela altura do contêiner */
  object-fit: cover; /* Ajusta a imagem para cobrir o contêiner sem distorcer */
}

.carousel-content {
  background-color: white;
  padding: 20px;
}

.carousel-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: 10;
  padding: 20px; /* Espaçamento interno */
  color: white;
  font-family: 'Georgia', Serif;
  font-weight: bold; /* Deixa o texto mais grosso */
  font-size: 50px; /* Define o tamanho da fonte */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Adiciona uma sombra ao texto */
}

@media (max-width: 768px) {
  .carousel-inner img {
    height: 300px !important; /* Mantém a mesma altura do carrossel fixo em dispositivos móveis */
  }
  .carousel-control-prev,
  .carousel-control-next {
    top: calc(30% - 50px);
    height: 40px;
    width: 40px;
  }
}

.about {
  background-color: grey;
  overflow: hidden;
  color: white;
  height: 600px;
}

.about-content {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 30px;
  padding: 18px 100px 100px 14px;
}

.about-content img {
  max-width: 320px;
}

.about-content div {
  flex: 1;
}

.about-description h2 {
  font-size: 38px;
  margin-bottom: 24px;
  font-family: 'Georgia', Serif;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.about-description p {
  margin-bottom: 14px;
  line-height: 150%;
  font-family: 'Georgia', Serif;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
  font-size: 17px;
}

@media screen and (max-width: 768px) {
  .about-content {
    flex-direction: column;
  }
}

/* Estilo para o botão "Agende seu horário" */
.schedule-btn {
  display: inline-flex;
  align-items: center;
  transition: transform 0.3s, box-shadow 0.3s;
}

.schedule-btn i {
  margin-left: 8px; /* Espaçamento entre o texto e o ícone */
}

.schedule-btn:hover {
  transform: translateY(-5px); /* Eleva o botão */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Adiciona uma sombra ao botão */
}

</style>

<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- The slideshow/carousel -->
  <div class="carousel-inner  carousel-fade">
    <div class="carousel-item active">
      <img src="img/barbearia4.jpg" alt="Los Angeles" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="img/barbearia5.jpg" alt="Chicago" class="d-block">
    </div>
    <div class="carousel-item">
      <img src="img/barbearia3 (3).jpg" alt="New York" class="d-block">
    </div>
    <div class="carousel-text">
      <h1>PROFISSIONALISMO E EXCELÊNCIA</h1>
      <a href="?pg=agendar" class="btn btn-dark btn-lg schedule-btn">AGENDE SEU HORÁRIO <i class="bi bi-calendar2"></i></a>
    </div>
  </div>
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>



<section class="about">
    <div class="container about-content">
        <div>
            <img src="img/pro.jpg" alt="Imagem sobre a barbearia"/>
        </div>
        <div class="about-description">
            <h2>Sobre nós:</h2>
            <p>"Somos uma barbearia que valoriza a autenticidade e a individualidade de cada cliente. Nossos barbeiros são treinados para compreender e atender às necessidades específicas de cada pessoa, garantindo que você saia com um visual que reflita sua personalidade única. Desde cortes clássicos até estilos mais arrojados, estamos aqui para ajudá-lo a expressar quem você é."</p>
            
        </div>
    </div>
</section>

