<?php 
include("../admin/php/connect_bd.php"); 
connect_base_de_datos();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medicina Empresarial en Movimiento - Contacto</title>
    <link rel="stylesheet" href="../css/main.css">
  </head>
  <body>

  <!-- lightbox  -->
  <div class="background-lightbox">
    <div class="text-alert">
      <img src="../img/close-icon.svg" alt="">
      <p> “GRACIAS POR PONERTE EN CONTACTO CON NOSOTROS, EN BREVE NOS COMUNICAREMOS”</p>
    </div>
  </div>

  <!-- Header  -->
  <header>
    <section class="logo">
      <a href="../index.php"><img class="logo-header" src="../img/logo-mem.svg" ></a>
    </section>

    <section class="menu-bar">
      <ul class="list-content">
        <a href="../index.php"><li class="list-item hvr-underline-from-center"><span >Inicio</span></li></a>
        <a href="quienes-somos.php"><li class="list-item hvr-underline-from-center"><span >Quiénes somos</span></li></a>
        <a href="servicios.php"><li class="list-item hvr-underline-from-center"><span >Servicios</span></li></a>
        <a href="instalaciones.php"><li class="list-item hvr-underline-from-center"><span>Instalaciones</span></li></a>
        <a href="notas.php"><li class="list-item hvr-underline-from-center"><span>Notas</span></li></a>
        <a href="contacto.php"><li class="list-item selected-menu-item"><span class="selected-menu-opt">Contacto</span></li></a>
      </ul>
    </section>

    <span class="nav-icon" >&#9776;</span>
      <ul class="mobile-nav animated">
        <a href="../index.php"><li class="list-item"><span>Inicio</span></li></a>
        <a href="quienes-somos.php"><li class="list-item"><span>Quiénes somos</span></li></a>
        <a href="servicios.php"><li class="list-item"><span>Servicios</span></li></a>
        <a href="instalaciones.php"><li class="list-item"><span>Instalaciones</span></li></a>
        <a href="notas.php"><li class="list-item"><span>Notas</span></li></a>
        <a href="contacto.php"><li class="list-item selected"><span>Contacto</span></li></a>
      </ul>

  </header>

  <!-- Contenido -->
  <div class="sites-quien">
      <h2 class="blue-bar">CONTÁCTANOS</h2>
      <br>
    <div class="contact-top-text">
      <span class="notas-item-title-text">¡ESTAMOS A TUS ÓRDENES!</span> <br><br>
      <span class="notas-item-data-location" style="color:#23275f;font-size:16px;">Dejanos tus datos y pronto nos comunicaremos contigo.</span> <br>
    </div>

    <div class="contact-content">

        <form class="" id="formContact" method="post">
          <div class="input-section">
            <span class="input-text">NOMBRE</span>
            <input required type="text" class="form-input" name="name" id="name">
          </div>
          <div class="required_name"></div>

          <div class="input-section">
            <span class="input-text">CORREO</span>
            <input required type="text" class="form-input" name="email" id="email">
          </div>
          <div class="required_email"></div>

          <div class="input-section message-input">
            <span class="input-text">MENSAJE</span>
            <textarea required name="message" id="message" rows="8" cols="40" class="form-input message-input"></textarea>
          </div>
          <div class="required_message"></div>
            <input type="submit" value="Enviar" class="send-data">
        </form>

        <div class="info-contact">

          <p class="info-text">
          LÓPEZ MATEOS NORTE 1038-5. COL. PROVIDENCIA. <br><br>
          CP. 44630, GUADALAJARA, JAL <br>
          TELÉFONO: <a tel="38188000" style="color:#000000">3818 8000</a><br><br>

          CORREO: CONTACTO@MEMGDL.COM <br>
          </p>
          <a href="" target="_blank" >
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 21.5 21.5" style="enable-background:new 0 0 21.5 21.5;" xml:space="preserve" class="info-contact">
            <style type="text/css">
              .st0{fill:#FFFFFF;}
              .st1{fill:#23275f;}
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

          <a href="" target="_blank">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 21.5 21.5" style="enable-background:new 0 0 21.5 21.5;" xml:space="preserve">
            <style type="text/css">
              .st0{fill:#FFFFFF;}
              .st1{fill:#23275f;}
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

          <a href="" target="_blank">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 21.5 21.5" style="enable-background:new 0 0 21.5 21.5;" xml:space="preserve">
            <style type="text/css">
              .st0{fill:#FFFFFF;}
              .st1{fill:#23275f;}
            </style>
            <g id="XMLID_211_">
              <path id="XMLID_215_" class="st0" d="M21.2,10.7c0,5.8-4.7,10.5-10.5,10.5c-5.8,0-10.5-4.7-10.5-10.5c0-5.8,4.7-10.5,10.5-10.5
                C16.5,0.3,21.2,4.9,21.2,10.7L21.2,10.7z M21.2,10.7"/>
              <path id="XMLID_212_" class="st1" d="M13.4,11.2h-1.9V18H8.7v-6.9H7.3V8.7h1.3V7.2c0-1.1,0.5-2.9,2.9-2.9l2.1,0v2.3h-1.5
                c-0.3,0-0.6,0.1-0.6,0.7v1.4h2.1L13.4,11.2z M13.4,11.2"/>
            </g>
            </svg>

          </a>
        </div>

    </div>

    <!-- Google Maps -->
    <section class="map">
      	<div class="map" id="googleMap" >	</div>
    </section>

  </div>

  <!-- Contact Us Bar -->
  <div class="contact-bar">
    <span class="contact-text">CONTÁCTANOS AL TELÉFONO: <a href="tel:3818 8000">3818 8000</a></span>
  </div>


  <!-- Footer -->
  <footer style="background-color:rgb(0,166,213);">
    <div class="footer-wrapper">
      <div class="footer-top-right">
        <ul class="nav-footer">
          <a href="../index.php"><li class="nav-footer-item"><span>Inicio</span></li></a>
          <a href="quienes-somos.php"><li class="nav-footer-item"><span >Quiénes somos</span></li></a>
          <a href="servicios.php"><li class="nav-footer-item"><span >Servicios</span></li></a>
          <a href="instalaciones.php"><li class="nav-footer-item"><span>Instalaciones</span></li></a>
          <a href="notas.php"><li class="nav-footer-item"><span>Notas</span></li></a>
          <a href="contacto.php"><li class="nav-footer-item"><span>Contacto</span></li></a>
        </ul>
      </div>

      <div class="footer-top-left">
        <ul class="data-list">
          <li class="data-list-item">LÓPEZ MATEOS NORTE 1038-8,</li>
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
              	.st1{fill:rgb(0,166,213);}
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
              	.st1{fill:rgb(0,166,213);}
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
              	.st1{fill:rgb(0,166,213);}
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

  <!-- Google API -->
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDYC7ZQMvFXYMjseH9iR1P30rqKBo7SOFc"></script>
  <script type="text/javascript" src="../js/google_api.js"></script>
  <script type="text/javascript">
  $('#formContact').submit(function(e){

    e.preventDefault();

    name = document.getElementById("name").value;
    email = document.getElementById("email").value;
    message = document.getElementById("message").value;
    if (name == '' && email == '' && message == '') {

      $('.required_name').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">¡NOMBRE OBLIGATORIO!.</span>');
      $('.required_name').hide(12000);
      $('.required_email').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">EMAIL OBLIGATORIO!.</span>');
      $('.required_email').hide(12000);
      $('.required_message').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">MENSAJE OBLIGATORIO!.</span>');
      $('.required_message').hide(12000);

    } else if (name == '' && email == '') {

      $('.required_name').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">¡NOMBRE OBLIGATORIO!.</span>');
      $('.required_name').hide(12000);
      $('.required_email').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">EMAIL OBLIGATORIO!.</span>');
      $('.required_email').hide(12000);

    } else if (name == '' && message == '') {

      $('.required_name').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">EMAIL OBLIGATORIO!.</span>');
      $('.required_name').hide(12000);
      $('.required_message').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">MENSAJE OBLIGATORIO!.</span>');
      $('.required_message').hide(12000);

    } else if (email == '' && message == '') {

      $('.required_email').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">EMAIL OBLIGATORIO!.</span>');
      $('.required_email').hide(12000);
      $('.required_message').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">MENSAJE OBLIGATORIO!.</span>');
      $('.required_message').hide(12000);

    } else if (name == '') {

      $('.required_name').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">¡NOMBRE OBLIGATORIO!.</span>');
      $('.required_name').hide(12000);

    } else if (email == '') {

      $('.required_email').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">EMAIL OBLIGATORIO!.</span>');
      $('.required_email').hide(12000);

    } else if (message == '') {

      $('.required_message').html('<span class="notas-item-data-location" style="color:#23275f;font-size:16px;padding: 0% 8% 0% 8%;">MENSAJE OBLIGATORIO!.</span>');
      $('.required_message').hide(12000);

    } else {

      var ajaxData = new FormData();
      ajaxData.append("action", $(this).serialize());
      ajaxData.append("namefunction","addContact");

      $.ajax({
        url: "../admin/php/functions.php",
        type: "POST",
        data: ajaxData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        success: function(result){
          $('#formContact')[0].reset();
          //PopUp submit
          $('.background-lightbox').css('opacity', '1');
          $('.background-lightbox').css('z-index', '9');

          $( ".text-alert img" ).click(function() {
            $('.background-lightbox').css('opacity', '0');
            $('.background-lightbox').css('z-index', '-9');
            location.reload();
          });
        },
        error: function(error){
          alert(error);
        }
      });

    };
      
  });
  </script>

  </body>
</html>
