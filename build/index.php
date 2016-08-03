<?php
include("admin/php/connect_bd.php");
// connect_base_de_datos();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medicina Empresarial en Movimiento</title>
    <link rel="stylesheet" href="css/main.css">
  </head>

  <style type="text/css">
  #modal {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgba(48,44,44,.8);
    display: block;
    transition: .3s;
    z-index: -9;
    opacity: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal-wrapper {
      width: 30%;
      height: auto;
      padding: 3vw;
      background: #fff;
      position: relative;
      padding: 8vw 3vw;
      z-index: 9;
  }

  .head-modal {
      text-align: center;
      font-size: 24px;
  }

  .content-modal {
      text-align: left;
  }

  .footer-modal {
      position: absolute;
      top: 0;
      right: 0;
  }

  form {
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    text-align: center;
    margin: 3vw 0 0;
    padding-left: 0 !important;
  }

  label,input#name-ticket{
    margin: 2vw 0;
  }

  input[type="submit"] {
    background: white;
    border: 1px solid #00a6d5;
    border-radius: 0;
    color: black;
    width: 85px;
    margin: 0 auto;
    padding: 1vw 0;
    cursor: pointer;
    transition: .3s;
  }

  input[type="submit"]:hover{
    background: #00a6d5;
  }

  input#name-ticket{
    border: 1px solid black;
    padding: 1vw;
  }

  input#name-ticket:focus{
    border: 1px solid black;
  }

  span.close-info svg {
      width: 25px;
      height: 25px;
      cursor: pointer;
  }

  .background-close {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    z-index: 7;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  span.error-msg {
    color: red;
    font-size: 18px;
    margin-top: 36px;
    display: none;
    transition: .3s;
  }


  @media (min-width: 1440px){
    .head-modal {
        font-size: 28px;
    }
  }


  @media (max-width: 1024px){
    .modal-wrapper {
      width: 30%;
      padding: 14vw 3vw;
    }

    .head-modal {
        font-size: 22px;
    }
  }

  @media (max-width: 768px){
    .modal-wrapper {
      width: 40%;
      padding: 16vw 3vw;
    }

    .head-modal {
        font-size: 20px;
    }
  }

  @media (max-width: 640px){
    .modal-wrapper {
      width: 50%;
      padding: 18vw 3vw;
    }

    .head-modal {
        font-size: 18px;
    }
  }

  @media (max-width: 480px){
    .modal-wrapper {
      width: 65%;
      padding: 20vw 3vw;
    }

    .head-modal {
        font-size: 16px;
    }
  }

  @media (max-width: 320px){
    .modal-wrapper {
      width: 75%;
      padding: 22vw 3vw;
    }
  }

  </style>

  <body>

  <!-- Header  -->
  <header>
    <section class="logo">
      <a href="index.php"><img class="logo-header" src="img/logo-mem.svg" ></a>
    </section>

    <section class="menu-bar">
      <ul class="list-content">
        <a href="index.php"><li class="list-item selected-menu-item"><span class="selected-menu-opt">Inicio</span></li></a>
        <a href="html/quienes-somos.php"><li class="list-item hvr-underline-from-center"><span >Quiénes somos</span></li></a>
        <a href="html/servicios.php"><li class="list-item hvr-underline-from-center"><span >Servicios</span></li></a>
        <a href="html/instalaciones.php"><li class="list-item hvr-underline-from-center"><span>Instalaciones</span></li></a>
        <a href="html/notas.php"><li class="list-item hvr-underline-from-center"><span>Notas</span></li></a>
        <a href="html/contacto.php"><li class="list-item hvr-underline-from-center"><span>Contacto</span></li></a>
      </ul>
    </section>

    <span class="nav-icon" >&#9776;</span>
      <ul class="mobile-nav animated">
        <a href="index.php"><li class="list-item selected"><span>Inicio</span></li></a>
        <a href="html/quienes-somos.php"><li class="list-item"><span>Quiénes somos</span></li></a>
        <a href="html/servicios.php"><li class="list-item"><span>Servicios</span></li></a>
        <a href="html/instalaciones.php"><li class="list-item"><span>Instalaciones</span></li></a>
        <a href="html/notas.php"><li class="list-item"><span>Notas</span></li></a>
        <a href="html/contacto.php"><li class="list-item"><span>Contacto</span></li></a>
      </ul>

  </header>

  <!-- Slider -->
  <section class="slider-wrapper">
    <span style="touch-action: manipulation" class="arrow-left" href="#"> < </span>
    <div class="touch-slider">

      <div class="swiper-container">
        <div class="swiper-wrapper">

          <?php
          $query = "SELECT * FROM bannersHome";
          $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
          while ($row = mysqli_fetch_array($result)) { ?>
            <div class="swiper-slide">
              <img src="admin/src/images/sliderHome/<?php echo $row['bannersHomeImage'];?>">
            </div>
          <?php } ?>

        </div>
      </div>

      <div class="pagination"></div>

    </div>
    <span style="touch-action: manipulation" class="arrow-right" href="#"> > </span>
  </section>

  <!-- Contenido -->
  <div class="quien-top">
    <h2>SERVICIOS</h2>
  </div>

  <!-- Selección de servicios -->
  <div class="opt-services">
    <div class="opt-services-list">

      <!-- item services -->
      <div class="opt-services-list-item" onclick="location.href='html/service-data.php?idservices=16';">
        <div class="service-icon">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          	 viewBox="0 0 105.9 121.8" style="enable-background:new 0 0 105.9 121.8;" xml:space="preserve">
          <path id="XMLID_197_" class="st0" d="M99.8,97.9v-1.7V81.9v0l0,0l0-0.2l0-0.1l0-0.1c-0.4-4.9-4.8-14.2-19.1-14.2
          	c-14.2,0-18.9,9.1-19.4,14l0,0.2v0.2l0,20.5c-0.1,1.3-1,5.3-7.7,5.3c-6.9,0-8-5.2-8.2-7V83.9v-1.1c1.9-1.1,3.2-3,3.7-5.2l0.7-0.1
          	c2.7-0.5,5.3-1.4,7.6-2.4c6.4-3,11-7.8,13.4-14c4.9-12.7,5.6-27.6,5.6-35.4c0-7.7-2.2-13.6-6.6-17.6C65,3.7,59.2,3.3,57,3.3
          	c-0.4,0-0.7,0-1.1,0c-1.5,0.1-2.8,0.8-3.8,2c-0.9,1.1-1.4,2.6-1.3,4.1c0.3,2.9,2.6,5,5.5,5c0.2,0,0.3,0,0.5,0c0,0,0,0,0,0
          	c0,0,0.1,0,0.1,0c0.8,0,3.4,0.1,5.3,1.9c2,1.8,3,4.9,3,9.4c0,12.1-1.7,23.3-4.9,31.4c-0.7,1.7-3.5,7.6-12.1,9.5l-0.8,0.2
          	c-1.4-1.8-3.7-3-6.2-3h-2.8c-2.5,0-4.8,1.2-6.2,3.1l-0.8-0.2c-2.2-0.5-9.8-2.5-12.5-9.5C15.8,48.9,14,37.7,14,25.6
          	c0-4.4,1-7.5,2.9-9.3c1.9-1.8,4.6-1.9,5.4-1.9c0.1,0,0.1,0,0.2,0c0.1,0,0.3,0,0.4,0c2.9,0,5.2-2.2,5.5-5.1c0.1-1.5-0.3-2.9-1.3-4.1
          	c-0.9-1.1-2.3-1.8-3.8-2c-0.2,0-0.6,0-1.1,0c-2.3,0-8.1,0.5-12.8,4.8c-4.4,4-6.6,9.9-6.6,17.6c0,7.8,0.7,22.7,5.6,35.4
          	c2.4,6.2,7,11,13.4,14c2.4,1.1,5.2,2,8.1,2.5l0.7,0.1c0.5,2.1,1.7,3.9,3.5,5v1.1v16.8v0l0,0l0,0.2l0,0.1l0,0
          	c0,0.2,1.4,17.5,19.3,17.5c18.1,0,18.8-15.9,18.8-16l0,0v0V82.4c0.2-0.9,1.6-4,8.4-4c6.8,0,7.9,3.1,8,3.8v13.9v1.5
          	c-2.1,1.6-3.4,4.1-3.4,7c0,4.9,4,8.8,8.8,8.8c4.9,0,8.8-4,8.8-8.8C103,101.9,101.7,99.5,99.8,97.9z M63.1,58.1
          	c3.3-8.5,5.1-20,5.1-32.5c0-5.3-1.3-9.2-3.9-11.6c-1.1-1-2.4-1.6-3.5-2c0.7-0.9,1.2-2,1.2-3.2c0-0.7-0.1-1.4-0.4-2
          	c2,0.6,4.2,1.6,6.3,3.4c3.7,3.4,5.6,8.6,5.6,15.4c0,7.6-0.7,22.1-5.4,34.4c-2.1,5.4-6.2,9.7-11.9,12.4c-2.1,1-4.5,1.7-6.9,2.2v-3
          	c0-0.8-0.1-1.5-0.3-2.2C56.7,67.7,61.4,62.7,63.1,58.1z M30.5,71.6v3c-2.6-0.5-5.1-1.2-7.3-2.3c-5.7-2.6-9.8-6.9-11.9-12.4
          	C6.6,47.7,5.9,33.2,5.9,25.6c0-6.8,1.9-12,5.6-15.4c2-1.9,4.3-2.9,6.3-3.4c-0.3,0.6-0.4,1.3-0.4,2c0,1.2,0.4,2.3,1.1,3.2
          	c-1.2,0.4-2.5,1-3.6,2.1c-2.6,2.4-3.9,6.3-3.9,11.5c0,12.5,1.8,24,5.1,32.5c1.8,4.7,6.6,9.7,14.7,11.4
          	C30.7,70.2,30.5,70.9,30.5,71.6z M34.5,75.1v-3.5c0-0.6,0.1-1.1,0.3-1.6c0.6-1.4,2-2.4,3.6-2.4h2.8c1.6,0,3,1,3.6,2.3
          	c0.2,0.5,0.4,1,0.4,1.6v3.5V76c0,1.8-1.2,3.3-2.9,3.8C42,79.9,41.7,80,41.3,80h-2.8c-0.4,0-0.9-0.1-1.3-0.2c-1.6-0.5-2.7-2-2.7-3.7
          	V75.1z M80.7,75.5c-9.8,0-11.2,5.8-11.3,6.6v20.3c0,0.1-0.6,13.2-15.8,13.2c-15.2,0-16.3-14.6-16.3-14.7l0-0.2V83.8
          	c0.4,0.1,0.8,0.1,1.3,0.1h2.8c0.4,0,0.7,0,1.1-0.1v16.7c0.1,1.3,1.2,9.8,11.2,9.8c9.9,0,10.6-7.1,10.7-8.1l0-20.6
          	c0.4-3.9,4.4-11.3,16.5-11.3c12.1,0,15.9,7.5,16.2,11.4l0,0.2v14.3c-0.9-0.3-1.8-0.4-2.7-0.4c-0.8,0-1.7,0.1-2.4,0.3V82
          	C91.6,81.2,90.5,75.5,80.7,75.5z M94.1,109.5c-2.7,0-4.9-2.2-4.9-4.9c0-1.8,1-3.4,2.5-4.2c0.7-0.4,1.5-0.7,2.4-0.7
          	c1,0,2,0.3,2.7,0.8c1.3,0.9,2.2,2.4,2.2,4.1C99,107.3,96.8,109.5,94.1,109.5z"/>
          </svg>

        </div>

        <div class="service-title">
          <?php
          $query = "SELECT * FROM services WHERE idservices = 16";
          $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
          $row = mysqli_fetch_array($result);
          ?>
          <span class="service-title-text"><?php echo $row['servicesName']?></span>
        </div>

      </div>

      <!-- item services -->
      <div class="opt-services-list-item" onclick="location.href='html/service-data.php?idservices=17';">
        <div class="service-icon">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          	 viewBox="0 0 105.9 121.8" style="enable-background:new 0 0 105.9 121.8;" xml:space="preserve">
          <path id="XMLID_197_" class="st0" d="M104.5,36.4C103,29.2,98.9,23.1,92.8,19c-4.5-3-9.8-4.6-15.2-4.6c-9.2,0-17.8,4.6-22.9,12.3
          	l-1.8,2.7l-1.8-2.7C46,19,37.5,14.4,28.3,14.4c-5.4,0-10.6,1.6-15.2,4.6C7,23.1,2.8,29.2,1.4,36.4c-1.5,7.2,0,14.5,4,20.6l47.4,50.3
          	l47.4-50l0.3-0.3C104.5,50.9,105.9,43.6,104.5,36.4z M6.2,37.4c1.2-5.9,4.6-11,9.6-14.3c3.7-2.5,8-3.8,12.4-3.8
          	c7.6,0,14.6,3.8,18.8,10.1l5.9,8.9l5.9-8.9c4.2-6.3,11.2-10.1,18.8-10.1c4.4,0,8.7,1.3,12.4,3.8c5,3.3,8.4,8.4,9.6,14.3
          	c1.2,5.8,0,11.8-3.2,16.7l-1,1H73c-0.7,0-1.4,0.5-1.7,1.1L68,65.4l-4.1-26.2c-0.1-0.8-0.7-1.4-1.5-1.5c-0.8-0.1-1.5,0.3-1.8,1
          	l-7.7,16.9h-42l-1.4-1.5C6.2,49.2,5,43.2,6.2,37.4z M14.1,59.2h39.8c0.7,0,1.3-0.4,1.6-1l5.8-12.6l4.2,27.1c0.1,0.8,0.8,1.4,1.6,1.5
          	c0.1,0,0.1,0,0.2,0c0.7,0,1.4-0.5,1.7-1.1l5.3-14.3h17.9l-39.4,41.5L14.1,59.2z"/>
          </svg>
        </div>

        <div class="service-title">
          <?php
          $query = "SELECT * FROM services WHERE idservices = 17";
          $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
          $row = mysqli_fetch_array($result);
          ?>
          <span class="service-title-text"><?php echo $row['servicesName']?></span>
        </div>
      </div>

      <!-- item services -->
      <div class="opt-services-list-item" onclick="location.href='html/service-data.php?idservices=18';">
        <div class="service-icon third">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          	 viewBox="0 0 105.9 121.8" style="enable-background:new 0 0 105.9 121.8;" xml:space="preserve">
          <style type="text/css">
          	.st0{fill:#66A8DD;}
          </style>
          <g id="XMLID_197_">
          	<path id="XMLID_205_" class="st0" d="M45.8,17.6H6.1c-3,0-5.4,2.4-5.4,5.4v3.6c0,3,2.4,5.4,5.4,5.4h2.8v56.6
          		c0,9.4,7.7,17.1,17.1,17.1c9.4,0,17.1-7.7,17.1-17.1V32h2.8c3,0,5.4-2.4,5.4-5.4V23C51.2,20,48.8,17.6,45.8,17.6z M39.4,88.6
          		c0,7.4-6,13.5-13.5,13.5c-7.4,0-13.5-6-13.5-13.5v-4.8h12.3c0.7,0,1.2-0.6,1.2-1.2c0-0.7-0.6-1.2-1.2-1.2H12.5v-9.2h12.3
          		c0.7,0,1.2-0.6,1.2-1.2c0-0.7-0.6-1.2-1.2-1.2H12.5v-9.2h12.3c0.7,0,1.2-0.6,1.2-1.2c0-0.7-0.6-1.2-1.2-1.2H12.5v-9.2h12.3
          		c0.7,0,1.2-0.6,1.2-1.2c0-0.7-0.6-1.2-1.2-1.2H12.5V32h26.9V88.6z M47.6,26.6c0,1-0.8,1.8-1.8,1.8H6.1c-1,0-1.8-0.8-1.8-1.8V23
          		c0-1,0.8-1.8,1.8-1.8h39.8c1,0,1.8,0.8,1.8,1.8V26.6z"/>
          	<g id="XMLID_200_">
          		<path id="XMLID_201_" class="st0" d="M99.8,17.6H60.1c-3,0-5.4,2.4-5.4,5.4v3.6c0,3,2.4,5.4,5.4,5.4h2.8v56.6
          			c0,9.4,7.7,17.1,17.1,17.1c9.4,0,17.1-7.7,17.1-17.1V32h2.8c3,0,5.4-2.4,5.4-5.4V23C105.2,20,102.8,17.6,99.8,17.6z M66.5,64.1V32
          			h26.9v32.1H66.5z M101.6,26.6c0,1-0.8,1.8-1.8,1.8H60.1c-1,0-1.8-0.8-1.8-1.8V23c0-1,0.8-1.8,1.8-1.8h39.8c1,0,1.8,0.8,1.8,1.8
          			V26.6z"/>
          	</g>
          	<g id="XMLID_198_">
          		<path id="XMLID_199_" class="st0" d="M64.9,82.2"/>
          	</g>
          </g>
          </svg>
        </div>

        <div class="service-title">
          <?php
          $query = "SELECT * FROM services WHERE idservices = 18";
          $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
          $row = mysqli_fetch_array($result);
          ?>
          <span class="service-title-text"><?php echo $row['servicesName']?></span>
        </div>
      </div>

      <!-- item services -->
      <div class="opt-services-list-item" onclick="location.href='html/service-data.php?idservices=19';">
        <div class="service-icon">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          	 viewBox="0 0 105.9 121.8" style="enable-background:new 0 0 105.9 121.8;" xml:space="preserve">
          <g id="XMLID_197_">
          	<path id="XMLID_198_" class="st0" d="M83,120.1H6.7c-1.3,0-2.4-1-2.4-2.3V94.5c0-1.3,1.1-2.3,2.4-2.3h19.9v-5.9H19
          		c-1.3,0-2.4-1-2.4-2.3v-6.3c0-1.3,1.1-2.3,2.4-2.3h46c1.3,0,2.4,1,2.4,2.3v6.3c0,1.3-1.1,2.3-2.4,2.3h-7.8v5.9h17.3
          		c8.3-5.6,12.6-13.7,12.6-23.9c0-8.5-2.3-14.9-6.9-19.2c-4.7-4.3-10.9-5.9-15.1-6.5l-1.6,4c-1.3,3.3-4.4,5.6-8.2,6.4l-1.7,4.4
          		c0.8,1.1,1.1,2.5,0.6,3.8c-0.6,1.5-2.2,2.6-4,2.6c-0.6,0-1.2-0.1-1.7-0.3L39.3,60c-2.3-0.9-3.5-3.3-2.7-5.4
          		c0.5-1.3,1.7-2.2,3.1-2.5l1.7-4.4c-2.4-3.1-3-6.9-1.7-10.3l9-22.4c1.3-3.2,4.1-5.5,7.8-6.3l1-2.5c1.1-2.9,4-4.9,7.2-4.9
          		c0.9,0,1.8,0.2,2.7,0.5c1.9,0.7,3.4,2.1,4.3,3.9c0.8,1.8,0.9,3.9,0.2,5.7l-1,2.5c2.2,3.1,2.8,6.8,1.5,10l-1,2.4
          		C77.7,28,85.5,30.8,92,36.9c8.1,7.6,12.2,18.1,12.2,31.4c0,19.2-10,30.7-18.9,37v12.5C85.4,119.1,84.3,120.1,83,120.1z M9.1,115.5
          		h71.5v-11.4c0-0.8,0.4-1.5,1-1.9c11.8-8.1,17.8-19.5,17.8-33.9c0-11.9-3.6-21.3-10.7-28C82,34,73.7,31.6,67.8,30.7
          		c-0.7-0.1-1.3-0.5-1.7-1.1c-0.4-0.6-0.4-1.4-0.2-2l2-5.1c0.8-2,0.2-4.4-1.6-6.3c-0.6-0.7-0.8-1.6-0.5-2.4l1.5-3.8
          		c0.3-0.7,0.3-1.5-0.1-2.2c-0.3-0.7-0.9-1.2-1.6-1.5C64.2,5.8,62.5,6.5,62,8l-1.5,3.8c-0.3,0.8-1.1,1.4-2,1.5
          		c-2.6,0.3-4.6,1.6-5.4,3.6l-9,22.4c-0.8,2.1-0.2,4.6,1.7,6.5c0.6,0.7,0.8,1.6,0.5,2.4l-2.8,7.2c-0.2,0.4-0.4,0.7-0.7,1l5.4,2
          		c-0.1-0.4,0-0.8,0.1-1.2l2.8-7.2c0.3-0.8,1.1-1.4,2-1.5c2.7-0.2,4.8-1.6,5.7-3.6l2.3-5.7c0.4-1,1.4-1.6,2.4-1.5
          		c4.6,0.4,13.3,1.9,19.8,7.9c5.6,5.2,8.4,12.8,8.4,22.6c0,12.2-5.1,21.7-15.3,28.2c-0.4,0.3-0.8,0.4-1.3,0.4H54.9
          		c-1.3,0-2.4-1-2.4-2.3V83.9c0-1.3,1.1-2.3,2.4-2.3h7.8v-1.6H21.4v1.6H29c1.3,0,2.4,1,2.4,2.3v10.6c0,1.3-1.1,2.3-2.4,2.3H9.1V115.5
          		z"/>
          </g>
          </svg>
        </div>

        <div class="service-title">
          <?php
          $query = "SELECT * FROM services WHERE idservices = 19";
          $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
          $row = mysqli_fetch_array($result);
          ?>
          <span class="service-title-text"><?php echo $row['servicesName']?></span>
        </div>
      </div>

      <!-- item services -->
      <div class="opt-services-list-item" onclick="location.href='html/service-data.php?idservices=20';">
        <div class="service-icon">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 105.9 121.8" style="enable-background:new 0 0 105.9 121.8;" xml:space="preserve">
          <path id="XMLID_197_" class="st0" d="M99.8,97.9v-1.7V81.9v0l0,0l0-0.2l0-0.1l0-0.1c-0.4-4.9-4.8-14.2-19.1-14.2
            c-14.2,0-18.9,9.1-19.4,14l0,0.2v0.2l0,20.5c-0.1,1.3-1,5.3-7.7,5.3c-6.9,0-8-5.2-8.2-7V83.9v-1.1c1.9-1.1,3.2-3,3.7-5.2l0.7-0.1
            c2.7-0.5,5.3-1.4,7.6-2.4c6.4-3,11-7.8,13.4-14c4.9-12.7,5.6-27.6,5.6-35.4c0-7.7-2.2-13.6-6.6-17.6C65,3.7,59.2,3.3,57,3.3
            c-0.4,0-0.7,0-1.1,0c-1.5,0.1-2.8,0.8-3.8,2c-0.9,1.1-1.4,2.6-1.3,4.1c0.3,2.9,2.6,5,5.5,5c0.2,0,0.3,0,0.5,0c0,0,0,0,0,0
            c0,0,0.1,0,0.1,0c0.8,0,3.4,0.1,5.3,1.9c2,1.8,3,4.9,3,9.4c0,12.1-1.7,23.3-4.9,31.4c-0.7,1.7-3.5,7.6-12.1,9.5l-0.8,0.2
            c-1.4-1.8-3.7-3-6.2-3h-2.8c-2.5,0-4.8,1.2-6.2,3.1l-0.8-0.2c-2.2-0.5-9.8-2.5-12.5-9.5C15.8,48.9,14,37.7,14,25.6
            c0-4.4,1-7.5,2.9-9.3c1.9-1.8,4.6-1.9,5.4-1.9c0.1,0,0.1,0,0.2,0c0.1,0,0.3,0,0.4,0c2.9,0,5.2-2.2,5.5-5.1c0.1-1.5-0.3-2.9-1.3-4.1
            c-0.9-1.1-2.3-1.8-3.8-2c-0.2,0-0.6,0-1.1,0c-2.3,0-8.1,0.5-12.8,4.8c-4.4,4-6.6,9.9-6.6,17.6c0,7.8,0.7,22.7,5.6,35.4
            c2.4,6.2,7,11,13.4,14c2.4,1.1,5.2,2,8.1,2.5l0.7,0.1c0.5,2.1,1.7,3.9,3.5,5v1.1v16.8v0l0,0l0,0.2l0,0.1l0,0
            c0,0.2,1.4,17.5,19.3,17.5c18.1,0,18.8-15.9,18.8-16l0,0v0V82.4c0.2-0.9,1.6-4,8.4-4c6.8,0,7.9,3.1,8,3.8v13.9v1.5
            c-2.1,1.6-3.4,4.1-3.4,7c0,4.9,4,8.8,8.8,8.8c4.9,0,8.8-4,8.8-8.8C103,101.9,101.7,99.5,99.8,97.9z M63.1,58.1
            c3.3-8.5,5.1-20,5.1-32.5c0-5.3-1.3-9.2-3.9-11.6c-1.1-1-2.4-1.6-3.5-2c0.7-0.9,1.2-2,1.2-3.2c0-0.7-0.1-1.4-0.4-2
            c2,0.6,4.2,1.6,6.3,3.4c3.7,3.4,5.6,8.6,5.6,15.4c0,7.6-0.7,22.1-5.4,34.4c-2.1,5.4-6.2,9.7-11.9,12.4c-2.1,1-4.5,1.7-6.9,2.2v-3
            c0-0.8-0.1-1.5-0.3-2.2C56.7,67.7,61.4,62.7,63.1,58.1z M30.5,71.6v3c-2.6-0.5-5.1-1.2-7.3-2.3c-5.7-2.6-9.8-6.9-11.9-12.4
            C6.6,47.7,5.9,33.2,5.9,25.6c0-6.8,1.9-12,5.6-15.4c2-1.9,4.3-2.9,6.3-3.4c-0.3,0.6-0.4,1.3-0.4,2c0,1.2,0.4,2.3,1.1,3.2
            c-1.2,0.4-2.5,1-3.6,2.1c-2.6,2.4-3.9,6.3-3.9,11.5c0,12.5,1.8,24,5.1,32.5c1.8,4.7,6.6,9.7,14.7,11.4
            C30.7,70.2,30.5,70.9,30.5,71.6z M34.5,75.1v-3.5c0-0.6,0.1-1.1,0.3-1.6c0.6-1.4,2-2.4,3.6-2.4h2.8c1.6,0,3,1,3.6,2.3
            c0.2,0.5,0.4,1,0.4,1.6v3.5V76c0,1.8-1.2,3.3-2.9,3.8C42,79.9,41.7,80,41.3,80h-2.8c-0.4,0-0.9-0.1-1.3-0.2c-1.6-0.5-2.7-2-2.7-3.7
            V75.1z M80.7,75.5c-9.8,0-11.2,5.8-11.3,6.6v20.3c0,0.1-0.6,13.2-15.8,13.2c-15.2,0-16.3-14.6-16.3-14.7l0-0.2V83.8
            c0.4,0.1,0.8,0.1,1.3,0.1h2.8c0.4,0,0.7,0,1.1-0.1v16.7c0.1,1.3,1.2,9.8,11.2,9.8c9.9,0,10.6-7.1,10.7-8.1l0-20.6
            c0.4-3.9,4.4-11.3,16.5-11.3c12.1,0,15.9,7.5,16.2,11.4l0,0.2v14.3c-0.9-0.3-1.8-0.4-2.7-0.4c-0.8,0-1.7,0.1-2.4,0.3V82
            C91.6,81.2,90.5,75.5,80.7,75.5z M94.1,109.5c-2.7,0-4.9-2.2-4.9-4.9c0-1.8,1-3.4,2.5-4.2c0.7-0.4,1.5-0.7,2.4-0.7
            c1,0,2,0.3,2.7,0.8c1.3,0.9,2.2,2.4,2.2,4.1C99,107.3,96.8,109.5,94.1,109.5z"/>
          </svg>

        </div>

        <div class="service-title">
          <?php
          $query = "SELECT * FROM services WHERE idservices = 20";
          $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
          $row = mysqli_fetch_array($result);
          ?>
          <span class="service-title-text"><?php echo $row['servicesName']?></span>
        </div>

      </div>

      <!-- item services -->
      <div class="opt-services-list-item" onclick="location.href='html/service-data.php?idservices=21';">
        <div class="service-icon">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 105.9 121.8" style="enable-background:new 0 0 105.9 121.8;" xml:space="preserve">
          <path id="XMLID_197_" class="st0" d="M99.8,97.9v-1.7V81.9v0l0,0l0-0.2l0-0.1l0-0.1c-0.4-4.9-4.8-14.2-19.1-14.2
            c-14.2,0-18.9,9.1-19.4,14l0,0.2v0.2l0,20.5c-0.1,1.3-1,5.3-7.7,5.3c-6.9,0-8-5.2-8.2-7V83.9v-1.1c1.9-1.1,3.2-3,3.7-5.2l0.7-0.1
            c2.7-0.5,5.3-1.4,7.6-2.4c6.4-3,11-7.8,13.4-14c4.9-12.7,5.6-27.6,5.6-35.4c0-7.7-2.2-13.6-6.6-17.6C65,3.7,59.2,3.3,57,3.3
            c-0.4,0-0.7,0-1.1,0c-1.5,0.1-2.8,0.8-3.8,2c-0.9,1.1-1.4,2.6-1.3,4.1c0.3,2.9,2.6,5,5.5,5c0.2,0,0.3,0,0.5,0c0,0,0,0,0,0
            c0,0,0.1,0,0.1,0c0.8,0,3.4,0.1,5.3,1.9c2,1.8,3,4.9,3,9.4c0,12.1-1.7,23.3-4.9,31.4c-0.7,1.7-3.5,7.6-12.1,9.5l-0.8,0.2
            c-1.4-1.8-3.7-3-6.2-3h-2.8c-2.5,0-4.8,1.2-6.2,3.1l-0.8-0.2c-2.2-0.5-9.8-2.5-12.5-9.5C15.8,48.9,14,37.7,14,25.6
            c0-4.4,1-7.5,2.9-9.3c1.9-1.8,4.6-1.9,5.4-1.9c0.1,0,0.1,0,0.2,0c0.1,0,0.3,0,0.4,0c2.9,0,5.2-2.2,5.5-5.1c0.1-1.5-0.3-2.9-1.3-4.1
            c-0.9-1.1-2.3-1.8-3.8-2c-0.2,0-0.6,0-1.1,0c-2.3,0-8.1,0.5-12.8,4.8c-4.4,4-6.6,9.9-6.6,17.6c0,7.8,0.7,22.7,5.6,35.4
            c2.4,6.2,7,11,13.4,14c2.4,1.1,5.2,2,8.1,2.5l0.7,0.1c0.5,2.1,1.7,3.9,3.5,5v1.1v16.8v0l0,0l0,0.2l0,0.1l0,0
            c0,0.2,1.4,17.5,19.3,17.5c18.1,0,18.8-15.9,18.8-16l0,0v0V82.4c0.2-0.9,1.6-4,8.4-4c6.8,0,7.9,3.1,8,3.8v13.9v1.5
            c-2.1,1.6-3.4,4.1-3.4,7c0,4.9,4,8.8,8.8,8.8c4.9,0,8.8-4,8.8-8.8C103,101.9,101.7,99.5,99.8,97.9z M63.1,58.1
            c3.3-8.5,5.1-20,5.1-32.5c0-5.3-1.3-9.2-3.9-11.6c-1.1-1-2.4-1.6-3.5-2c0.7-0.9,1.2-2,1.2-3.2c0-0.7-0.1-1.4-0.4-2
            c2,0.6,4.2,1.6,6.3,3.4c3.7,3.4,5.6,8.6,5.6,15.4c0,7.6-0.7,22.1-5.4,34.4c-2.1,5.4-6.2,9.7-11.9,12.4c-2.1,1-4.5,1.7-6.9,2.2v-3
            c0-0.8-0.1-1.5-0.3-2.2C56.7,67.7,61.4,62.7,63.1,58.1z M30.5,71.6v3c-2.6-0.5-5.1-1.2-7.3-2.3c-5.7-2.6-9.8-6.9-11.9-12.4
            C6.6,47.7,5.9,33.2,5.9,25.6c0-6.8,1.9-12,5.6-15.4c2-1.9,4.3-2.9,6.3-3.4c-0.3,0.6-0.4,1.3-0.4,2c0,1.2,0.4,2.3,1.1,3.2
            c-1.2,0.4-2.5,1-3.6,2.1c-2.6,2.4-3.9,6.3-3.9,11.5c0,12.5,1.8,24,5.1,32.5c1.8,4.7,6.6,9.7,14.7,11.4
            C30.7,70.2,30.5,70.9,30.5,71.6z M34.5,75.1v-3.5c0-0.6,0.1-1.1,0.3-1.6c0.6-1.4,2-2.4,3.6-2.4h2.8c1.6,0,3,1,3.6,2.3
            c0.2,0.5,0.4,1,0.4,1.6v3.5V76c0,1.8-1.2,3.3-2.9,3.8C42,79.9,41.7,80,41.3,80h-2.8c-0.4,0-0.9-0.1-1.3-0.2c-1.6-0.5-2.7-2-2.7-3.7
            V75.1z M80.7,75.5c-9.8,0-11.2,5.8-11.3,6.6v20.3c0,0.1-0.6,13.2-15.8,13.2c-15.2,0-16.3-14.6-16.3-14.7l0-0.2V83.8
            c0.4,0.1,0.8,0.1,1.3,0.1h2.8c0.4,0,0.7,0,1.1-0.1v16.7c0.1,1.3,1.2,9.8,11.2,9.8c9.9,0,10.6-7.1,10.7-8.1l0-20.6
            c0.4-3.9,4.4-11.3,16.5-11.3c12.1,0,15.9,7.5,16.2,11.4l0,0.2v14.3c-0.9-0.3-1.8-0.4-2.7-0.4c-0.8,0-1.7,0.1-2.4,0.3V82
            C91.6,81.2,90.5,75.5,80.7,75.5z M94.1,109.5c-2.7,0-4.9-2.2-4.9-4.9c0-1.8,1-3.4,2.5-4.2c0.7-0.4,1.5-0.7,2.4-0.7
            c1,0,2,0.3,2.7,0.8c1.3,0.9,2.2,2.4,2.2,4.1C99,107.3,96.8,109.5,94.1,109.5z"/>
          </svg>

        </div>

        <div class="service-title">
          <?php
          $query = "SELECT * FROM services WHERE idservices = 21";
          $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
          $row = mysqli_fetch_array($result);
          ?>
          <span class="service-title-text"><?php echo $row['servicesName']?></span>
        </div>

      </div>

      <!-- item services -->
      <div class="opt-services-list-item" onclick="location.href='html/service-data.php?idservices=22';">
        <div class="service-icon">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 105.9 121.8" style="enable-background:new 0 0 105.9 121.8;" xml:space="preserve">
          <path id="XMLID_197_" class="st0" d="M99.8,97.9v-1.7V81.9v0l0,0l0-0.2l0-0.1l0-0.1c-0.4-4.9-4.8-14.2-19.1-14.2
            c-14.2,0-18.9,9.1-19.4,14l0,0.2v0.2l0,20.5c-0.1,1.3-1,5.3-7.7,5.3c-6.9,0-8-5.2-8.2-7V83.9v-1.1c1.9-1.1,3.2-3,3.7-5.2l0.7-0.1
            c2.7-0.5,5.3-1.4,7.6-2.4c6.4-3,11-7.8,13.4-14c4.9-12.7,5.6-27.6,5.6-35.4c0-7.7-2.2-13.6-6.6-17.6C65,3.7,59.2,3.3,57,3.3
            c-0.4,0-0.7,0-1.1,0c-1.5,0.1-2.8,0.8-3.8,2c-0.9,1.1-1.4,2.6-1.3,4.1c0.3,2.9,2.6,5,5.5,5c0.2,0,0.3,0,0.5,0c0,0,0,0,0,0
            c0,0,0.1,0,0.1,0c0.8,0,3.4,0.1,5.3,1.9c2,1.8,3,4.9,3,9.4c0,12.1-1.7,23.3-4.9,31.4c-0.7,1.7-3.5,7.6-12.1,9.5l-0.8,0.2
            c-1.4-1.8-3.7-3-6.2-3h-2.8c-2.5,0-4.8,1.2-6.2,3.1l-0.8-0.2c-2.2-0.5-9.8-2.5-12.5-9.5C15.8,48.9,14,37.7,14,25.6
            c0-4.4,1-7.5,2.9-9.3c1.9-1.8,4.6-1.9,5.4-1.9c0.1,0,0.1,0,0.2,0c0.1,0,0.3,0,0.4,0c2.9,0,5.2-2.2,5.5-5.1c0.1-1.5-0.3-2.9-1.3-4.1
            c-0.9-1.1-2.3-1.8-3.8-2c-0.2,0-0.6,0-1.1,0c-2.3,0-8.1,0.5-12.8,4.8c-4.4,4-6.6,9.9-6.6,17.6c0,7.8,0.7,22.7,5.6,35.4
            c2.4,6.2,7,11,13.4,14c2.4,1.1,5.2,2,8.1,2.5l0.7,0.1c0.5,2.1,1.7,3.9,3.5,5v1.1v16.8v0l0,0l0,0.2l0,0.1l0,0
            c0,0.2,1.4,17.5,19.3,17.5c18.1,0,18.8-15.9,18.8-16l0,0v0V82.4c0.2-0.9,1.6-4,8.4-4c6.8,0,7.9,3.1,8,3.8v13.9v1.5
            c-2.1,1.6-3.4,4.1-3.4,7c0,4.9,4,8.8,8.8,8.8c4.9,0,8.8-4,8.8-8.8C103,101.9,101.7,99.5,99.8,97.9z M63.1,58.1
            c3.3-8.5,5.1-20,5.1-32.5c0-5.3-1.3-9.2-3.9-11.6c-1.1-1-2.4-1.6-3.5-2c0.7-0.9,1.2-2,1.2-3.2c0-0.7-0.1-1.4-0.4-2
            c2,0.6,4.2,1.6,6.3,3.4c3.7,3.4,5.6,8.6,5.6,15.4c0,7.6-0.7,22.1-5.4,34.4c-2.1,5.4-6.2,9.7-11.9,12.4c-2.1,1-4.5,1.7-6.9,2.2v-3
            c0-0.8-0.1-1.5-0.3-2.2C56.7,67.7,61.4,62.7,63.1,58.1z M30.5,71.6v3c-2.6-0.5-5.1-1.2-7.3-2.3c-5.7-2.6-9.8-6.9-11.9-12.4
            C6.6,47.7,5.9,33.2,5.9,25.6c0-6.8,1.9-12,5.6-15.4c2-1.9,4.3-2.9,6.3-3.4c-0.3,0.6-0.4,1.3-0.4,2c0,1.2,0.4,2.3,1.1,3.2
            c-1.2,0.4-2.5,1-3.6,2.1c-2.6,2.4-3.9,6.3-3.9,11.5c0,12.5,1.8,24,5.1,32.5c1.8,4.7,6.6,9.7,14.7,11.4
            C30.7,70.2,30.5,70.9,30.5,71.6z M34.5,75.1v-3.5c0-0.6,0.1-1.1,0.3-1.6c0.6-1.4,2-2.4,3.6-2.4h2.8c1.6,0,3,1,3.6,2.3
            c0.2,0.5,0.4,1,0.4,1.6v3.5V76c0,1.8-1.2,3.3-2.9,3.8C42,79.9,41.7,80,41.3,80h-2.8c-0.4,0-0.9-0.1-1.3-0.2c-1.6-0.5-2.7-2-2.7-3.7
            V75.1z M80.7,75.5c-9.8,0-11.2,5.8-11.3,6.6v20.3c0,0.1-0.6,13.2-15.8,13.2c-15.2,0-16.3-14.6-16.3-14.7l0-0.2V83.8
            c0.4,0.1,0.8,0.1,1.3,0.1h2.8c0.4,0,0.7,0,1.1-0.1v16.7c0.1,1.3,1.2,9.8,11.2,9.8c9.9,0,10.6-7.1,10.7-8.1l0-20.6
            c0.4-3.9,4.4-11.3,16.5-11.3c12.1,0,15.9,7.5,16.2,11.4l0,0.2v14.3c-0.9-0.3-1.8-0.4-2.7-0.4c-0.8,0-1.7,0.1-2.4,0.3V82
            C91.6,81.2,90.5,75.5,80.7,75.5z M94.1,109.5c-2.7,0-4.9-2.2-4.9-4.9c0-1.8,1-3.4,2.5-4.2c0.7-0.4,1.5-0.7,2.4-0.7
            c1,0,2,0.3,2.7,0.8c1.3,0.9,2.2,2.4,2.2,4.1C99,107.3,96.8,109.5,94.1,109.5z"/>
          </svg>

        </div>

        <div class="service-title">
          <?php
          $query = "SELECT * FROM services WHERE idservices = 22";
          $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
          $row = mysqli_fetch_array($result);
          ?>
          <span class="service-title-text"><?php echo $row['servicesName']?></span>
        </div>

      </div>

    </div>
  </div>

  <!-- Consulta tus resultados -->
  <div class="results-wrapper">

    <div class="results-img">
      <img src="img/banner-2-01.png">
    </div>

    <div class="results-info" style="cursor:pointer">

        <div class="results-info-box">
          <div class="results-icon">
            <img src="img/icon-5.svg">
          </div>
          <span class="results-info-text">
            CONSULTA <br> TUS RESULTADOS
          </span>
        </div>

    </div>

    <div id="modal" class="modal">

      <div class="background-close"></div>

      <div class="modal-wrapper">
        <div class="head-modal">Consulta de resultados</div>
        <div class="content-modal">
          <form id="formResults" style="padding-left: 32%;">

            <input required type="text" id="name-ticket" name"name-ticket" placeholder="Ingrese ticket del paciente">
            <input type="submit" value="Consultar">
            <span class="error-msg">Lo sentimos, el ticket no existe.</span>
          </form>
        </div>
        <div class="footer-modal">
          <span class="close-info">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            	 viewBox="0 0 50 48.7" style="enable-background:new 0 0 50 48.7;" xml:space="preserve">
            <style type="text/css">
            	.st99{fill:none;stroke:#000;stroke-width:4;stroke-linecap:round;stroke-miterlimit:10;}
            </style>
            <g>
            	<line class="st99" x1="13.9" y1="13.3" x2="37.7" y2="37.1"/>
            	<line class="st99" x1="37.7" y1="13.3" x2="13.9" y2="37.1"/>
            </g>
            </svg>
          </span>
        </div>
      </div>

    </div>

  </div>

  <!-- Nuestras Promociones -->
  <div class="promo-wrapper">
    <div class="promo-title">
      <div class="results-info-box">
        <div class="results-icon">
          <img src="img/icon-6.svg">
        </div>

        <span class="results-info-text">
          NUESTRAS <br> PROMOCIONES
        </span>
      </div>
    </div>

    <div class="promo-banners">
    <!DOCTYPE html>
    <html>
      <body>
      <div class="touch-slider bottom-slider">
      <span style="touch-action: manipulation" class="arrow-left arrow-bottom-left" href="#"> < </span>
        <div class="swiper-container swiper-container2">
          <div class="swiper-wrapper">

            <?php
            $query1 = "SELECT * FROM bannersPromotions";
            $result1 = mysqli_query(Conectar::con(),$query1) or die(mysqli_error(Conectar::con()));
            while ($row1 = mysqli_fetch_array($result1)) { ?>
              <div class="swiper-slide">
                <img src="admin/src/images/sliderPromotions/<?php echo $row1['bannersPromotionsImage'];?>">
              </div>
            <?php } ?>

          </div>
        </div>
        <span style="touch-action: manipulation" class="arrow-right arrow-bottom-right" href="#"> > </span>

        <div class="pagination pagination2"></div>
        </div>
      </body>
    </html>
    </div>

  </div>

  <!-- Contact Us Barra -->
  <div class="contact-bar">
    <span class="contact-text">CONTÁCTANOS AL TELÉFONO: <a href="tel:3818 8000">3818 8000</a></span>
  </div>

  <!-- Footer -->
  <footer>
    <div class="footer-wrapper">
      <div class="footer-top-right">
        <ul class="nav-footer">
          <a href="index.php"><li class="nav-footer-item"><span>Inicio</span></li></a>
          <a href="html/quienes-somos.php"><li class="nav-footer-item"><span >Quiénes somos</span></li></a>
          <a href="html/servicios.php"><li class="nav-footer-item"><span >Servicios</span></li></a>
          <a href="html/instalaciones.php"><li class="nav-footer-item"><span>Instalaciones</span></li></a>
          <a href="html/notas.php"><li class="nav-footer-item"><span>Notas</span></li></a>
          <a href="html/contacto.php"><li class="nav-footer-item"><span>Contacto</span></li></a>
        </ul>
      </div>

      <div class="footer-top-left">
        <ul class="data-list">
          <li class="data-list-item">LÓPEZ MATEOS NORTE 1038-5,</li>
          <li class="data-list-item">COL. PROVIDENCIA.</li>
          <li class="data-list-item">CP. 44630, GUADALAJARA, JAL.</li>
          <li class="data-list-item">TELÉFONO: <a href="tel:3818 8000" style="color: #fff">3818 8000</a></li>
        </ul>

        <ul class="social-list">
          <li class="social-list-item">
            <a href="">

              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 viewBox="0 0 21.5 21.5" style="enable-background:new 0 0 21.5 21.5;" xml:space="preserve">
              <style type="text/css">
              	.st0{fill:#FFFFFF;}
              	.st1{fill:rgb(0,166,213);;}
              </style>
              <g id="XMLID_210_">
              	<path id="XMLID_216_" class="st0" d="M21.3,10.8c0,5.8-4.7,10.5-10.5,10.5C5,21.3,0.3,16.6,0.3,10.8C0.3,5,5,0.3,10.8,0.3
              		C16.6,0.3,21.3,5,21.3,10.8L21.3,10.8z M21.3,10.8"/>
              	<path id="XMLID_211_" class="st1" d="M17,11.6v4.3h-2.5v-4c0-1-0.4-1.7-1.3-1.7c-0.7,0-1.1,0.5-1.3,0.9c-0.1,0.2-0.1,0.4-0.1,0.6
              		v4.2H9.4c0,0,0-6.8,0-7.5h2.5v1.1c0,0,0,0,0,0l0,0v0c0.3-0.5,0.9-1.2,2.3-1.2C15.8,8.2,17,9.3,17,11.6L17,11.6z M6.8,4.7
              		C5.9,4.7,5.3,5.3,5.3,6c0,0.7,0.5,1.3,1.4,1.3h0c0.9,0,1.4-0.6,1.4-1.3C8.1,5.3,7.6,4.7,6.8,4.7L6.8,4.7z M5.5,15.9H8V8.4H5.5V15.9
              		z M5.5,15.9"/>
              </g>
              </svg>

            </a>
          </li>

          <li class="social-list-item">
            <a href="">

              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 viewBox="0 0 21.5 21.5" style="enable-background:new 0 0 21.5 21.5;" xml:space="preserve">
              <style type="text/css">
              	.st0{fill:#FFFFFF;}
              	.st1{fill:rgb(0,166,213);;}
              </style>
              <g id="XMLID_211_">
              	<path id="XMLID_215_" class="st0" d="M21.2,10.7c0,5.8-4.7,10.5-10.5,10.5c-5.8,0-10.5-4.7-10.5-10.5c0-5.8,4.7-10.5,10.5-10.5
              		C16.5,0.3,21.2,4.9,21.2,10.7L21.2,10.7z M21.2,10.7"/>
              	<path id="XMLID_212_" class="st1" d="M17.2,7.8c-0.4,0.2-0.9,0.3-1.4,0.4c0.5-0.3,0.9-0.8,1.1-1.4c-0.5,0.3-1,0.5-1.6,0.6
              		c-0.5-0.5-1.1-0.8-1.8-0.8c-1.4,0-2.5,1.1-2.5,2.5c0,0.2,0,0.4,0.1,0.6C8.9,9.6,7,8.6,5.8,7.1C5.6,7.4,5.4,7.9,5.4,8.3
              		c0,0.9,0.4,1.6,1.1,2.1c-0.4,0-0.8-0.1-1.1-0.3c0,0,0,0,0,0c0,1.2,0.9,2.2,2,2.5c-0.2,0.1-0.4,0.1-0.7,0.1c-0.2,0-0.3,0-0.5,0
              		c0.3,1,1.2,1.7,2.3,1.7c-0.9,0.7-1.9,1.1-3.1,1.1c-0.2,0-0.4,0-0.6,0c1.1,0.7,2.4,1.1,3.8,1.1c4.6,0,7.1-3.8,7.1-7.1
              		c0-0.1,0-0.2,0-0.3C16.4,8.7,16.8,8.3,17.2,7.8L17.2,7.8z M17.2,7.8"/>
              </g>
              </svg>

            </a>
          </li>

          <li class="social-list-item ">
            <a href="">

              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 viewBox="0 0 21.5 21.5" style="enable-background:new 0 0 21.5 21.5;" xml:space="preserve">
              <style type="text/css">
              	.st0{fill:#FFFFFF;}
              	.st1{fill:rgb(0,166,213);;}
              </style>
              <g id="XMLID_211_">
              	<path id="XMLID_215_" class="st0" d="M21.2,10.7c0,5.8-4.7,10.5-10.5,10.5c-5.8,0-10.5-4.7-10.5-10.5c0-5.8,4.7-10.5,10.5-10.5
              		C16.5,0.3,21.2,4.9,21.2,10.7L21.2,10.7z M21.2,10.7"/>
              	<path id="XMLID_212_" class="st1" d="M13.4,11.2h-1.9V18H8.7v-6.9H7.3V8.7h1.3V7.2c0-1.1,0.5-2.9,2.9-2.9l2.1,0v2.3h-1.5
              		c-0.3,0-0.6,0.1-0.6,0.7v1.4h2.1L13.4,11.2z M13.4,11.2"/>
              </g>
              </svg>

            </a>
         </li>

        </ul>

      </div>
    </div>
  </footer>

  <!-- JQuery  -->
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

  <!-- Responsive Menu Script -->
  <script type="text/javascript">
    var icon=document.querySelector(".nav-icon"),show=!1;icon.onclick=function(){show?($(".mobile-nav").removeClass("fadeInDown"),$(".mobile-nav").addClass("fadeOutUp")):($(".mobile-nav").addClass("is-show"),$(".mobile-nav").addClass("fadeInDown"),$(".mobile-nav").removeClass("fadeOutUp")),show=!show};
  </script>

  <!-- hover boxes -->
  <script type="text/javascript">
    $(".opt-services-list-item").mouseenter(function(){$(".service-icon svg .st0",this).css("fill","#fff"),$("span.service-title-text",this).css("color","#fff")}).mouseleave(function(){$("span.service-title-text",this).css("color","rgb(0,173,223)"),$(".service-icon svg .st0",this).css("fill","#66A8DD")});
  </script>

  <!-- Initialize Swiper -->
  <script src="js/slider.js"></script>

  <!-- Slider top settings -->
  <script type="text/javascript">
    var mySwiper = new Swiper('.swiper-container',{
      pagination: '.pagination',
      loop:true,
      grabCursor: false,
      paginationClickable: true,
      autoplay:false
      // speed:1500
    })
    $('.arrow-left').on('click', function(e){
      mySwiper.swipePrev()
    })
    $('.arrow-right').on('click', function(e){
      mySwiper.swipeNext()
    })
  </script>

  <!-- Slider bottom settings -->
  <script type="text/javascript">
    var mySwiper2 = new Swiper('.swiper-container2',{
      pagination: '.pagination2',
      loop:true,
      grabCursor: false,
      paginationClickable: true,
      autoplay:false
      // speed:1500
    })
    $('.arrow-bottom-left').on('click', function(e){
      mySwiper2.swipePrev()
    })
    $('.arrow-bottom-right').on('click', function(e){
      mySwiper2.swipeNext()
    })
  </script>

  <script type="text/javascript">
    $( '.results-info' ).click(function() {
      $('#modal').css('z-index','9');
      setTimeout(function(){
        $('#modal').css('opacity','1');
      }, 150);
      $('html').css({"overflow-y" : "hidden"});
      if ($(window).width() <= 768) {
        $('html,body').css({
          "overflow-y" : "hidden",
          "position" : "fixed"
        })
      }
    });

    $( 'span.close-info,.background-close' ).click(function() {
      $('#modal').css('opacity','0');
      setTimeout(function(){
        $('#modal').css('z-index','-9');
      },235);
      $('html,body').css({
        "overflow-y" : "scroll",
        "position" : "static"
      })
    });
    </script>

  <script type="text/javascript">
    $('#formResults').submit(function(e){
      e.preventDefault();

      var ticket = $('#name-ticket').val();
      var ajaxData = new FormData();
      ajaxData.append("ticket", ticket);
      ajaxData.append("namefunction","resultsPDF");

        $.ajax({
          url: "./admin/php/functions.php",
          type: "POST",
          data: ajaxData,
          processData: false,  // tell jQuery not to process the data
          contentType: false,   // tell jQuery not to set contentType
          success: function(result){
            if (result == 0) {
              $('.error-msg').css('display','block');
            } else {
              // alert(result);
              // window.location.href = "html/resultados-pdf.php?idResultTicket="+result;
              window.location.href = "admin/src/files/pdf/"+result;
            };
            // location.reload();
          },
          error: function(error){
            alert(error);
          }
        });
      });

  </script>

  </body>
</html>
