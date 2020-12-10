
<?php
 session_start();
//Si la variable sesión corresponde a la de organizacion
 // if (!isset($_SESSION['roles_id'])) 
// {
   /* nos envía a la siguiente dirección en el caso de no poseer autorización 
   header("location:../index.html"); 
}
*/
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <!-- Estilos perzonalizados-->
  <link rel="stylesheet" href="../css/stylos.css">
  <link rel="stylesheet" href="../css/postulacion.css">
  <link rel="stylesheet" href="../css/stylo_registro.css">
  <link rel="stylesheet" href="../css/footer.css">
  

  
  <title>Municipalidad de Hualpén</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark  fixed-top sps sps--abv">
    <div class="container">
      <a class="navbar-brand" href="../index.html">
        <img class="logotipo" src="../img/DDDDDASD.png" alt="logo-municipalidad">
      </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link letras-menu" href="../index.html">Inicio</a>
          </li>
         
          <li class="nav-item active">
            <a class="nav-link letras-menu" href="../somos.html">Somos</a>
          </li>
          <li class="nav-item letras-menu active">
            <a class="nav-link" href="../concejomuni/concejomuni.html">Concejo Municipal</a>
          </li> 
          <li class="nav-item letras-menu active">
            <a class="nav-link" href="../concejomuni/alcaldesa.html">Alcaldesa</a>
          </li>
          <li class="nav-item dropdown letras-menu active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Proyectos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../proyectos/proyecto1.html">Brisas de labranza - II</a>
              <a class="dropdown-item" href="../proyectos/proyecto2.html">Construcción de Nichos</a>
              <a class="dropdown-item" href="../proyectos/proyecto3.html">Beca alimentación</a>
              <a class="dropdown-item" href="../proyectos/proyecto4.html">Beneficio Tablet</a>
            </div>
          </li>

          <li class="nav-item active letras-menu">
            <a class="nav-link" href="../proyectos/proyectos-totales.html">Proyectos Totales</a>
          </li>
          <li class="nav-item active letras-menu">
            <a class="nav-link" href="indexlogeado.php">Enviar postulación</a>
          </li>
        
          <li>
            <a href="https://www.facebook.com/Munihualpen" target="_blank">
            <img class="logotipo-redes-sociales" src="../img/facebook-logo-button.svg" alt="Facebook" >
          </a>
          <a href="https://www.instagram.com/explore/locations/1871656843054017/municipalidad-de-hualpen/" target="_blank">
            <img class="logotipo-redes-sociales" src="../img/instagram-logo.svg" alt="Instagram">
          </a>
          <a href="https://twitter.com/hualpenciudad" target="_blank">
            <img class="logotipo-redes-sociales" src="../img/twitter-logo-button.svg" alt="Twitter">
          </a>
          </li>
        </ul>
      </div>
    </div>
</nav>
  <!-- FINAL DEL MENU-->




  <section class="formulario_de_registro">
    <h4>Postulación Proyecto</h4>
    <form action="" method="POST">
      <div class="form-group row">
        <label for="inputEmail3" class="col-dm-12 col-form-label">Carta dirigida alcaldia</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
          <label class="custom-file-label chiquito" for="customFileLang">Seleccionar Archivo</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-dm-12 col-form-label">Formulario proyecto (ONLINE)</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
          <label class="custom-file-label chiquito" for="customFileLang">Seleccionar Archivo</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-dm-12 col-form-label">Certificado persona juridica</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
          <label class="custom-file-label chiquito" for="customFileLang">Seleccionar Archivo</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-6 col-form-label">Foto libreta ahorro</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
          <label class="custom-file-label chiquito" for="customFileLang">Seleccionar Archivo</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-6 col-form-label">Foto rut organizacion</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
          <label class="custom-file-label chiquito" for="customFileLang">Seleccionar Archivo</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-12 col-form-label">Foto miembros directiva
        </label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
          <label class="custom-file-label chiquito" for="customFileLang">Seleccionar Archivo</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-12 col-form-label">Foto declaración jurada</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
          <label class="custom-file-label chiquito" for="customFileLang">Seleccionar Archivo</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-dm-12 col-form-label">Certificado de riesgo de persona juridica</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
          <label class="custom-file-label chiquito" for="customFileLang">Seleccionar Archivo</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-6 col-form-label">Cotizaciones</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
          <label class="custom-file-label chiquito" for="customFileLang">Seleccionar Archivo</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-12 col-form-label">Certificado de capacitación 2020</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
          <label class="custom-file-label chiquito" for="customFileLang">Seleccionar Archivo</label>
        </div>
      </div>
      
      <p>Estoy de acuerdo con 
        <a href="">Terminos y Condiciones</a> 
    </p>
    <a href="">
    <input class="boton1" type="submit" name="submit" value="Enviar postulacion">
    </a>

<input class="boton2" type="reset">
    
    </form>
        
  

  </section>


  <!-- INICIO FOOTER -->
<footer>
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-4 col-md3 item">
        <a href="">
        <img class="logotipo-footer" src="../img/DDDDDASD.png" alt="">
        </a>
      </div>
  
    <div class="col-sm-4 col-md3 item">
      <a href="" class="">
      <img class="logotipo-ambiente" src="../img/Logo-Ambiente-300x300.png" alt="">
      </a>
    </div> 
      <div class="col-sm-4 col-md3 item">
        <h3 class="contacto text-left">CONTACTO</h3>
          <p class="text-left">Calle Patria Nueva Nº 1035 (Ex Escuela Perla del Bio Bio) Hualpén</p>
          <p class="text-left">Región del Bío Bío, Chile</p>
          <p class="text-left">Email: municipalidad@hualpenciudad.cl</p>
          <p class="text-left">Atención Oficina de Partes de Lunes a Viernes de;</p>
          <p class="text-left">08:30 Hrs a 14:00 Hrs.</p>
      </div> 
    </div>
    <a href="https://www.facebook.com/Munihualpen" target="_blank">
      <img class="logotipo-redes-sociales-footer" src="../img/facebook-logo-button.svg" alt="Facebook">
    </a>
    <a href="https://www.instagram.com/explore/locations/1871656843054017/municipalidad-de-hualpen/" target="_blank">
      <img class="logotipo-redes-sociales-footer" src="../img/instagram-logo.svg" alt="Instagram">
    </a>
    <a href="https://twitter.com/hualpenciudad" target="_blank">
      <img class="logotipo-redes-sociales-footer " src="../img/twitter-logo-button.svg" alt="Twitter">
    </a>
      <p class="altura-footer"> "Lenga, verdadero sabor de mar"</p>
    </div>
  
    
  </footer>
  <div class="footer-copyright text-center py-3 fondo-coppy">
  
    © 2020 Copyright:
  
    <a>Municipalidad de Hualpen</a>
  
  </div>
  <!-- FIN DEL FOOTER -->


</body>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
-->
<!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="../js/bootstrap.js"></script>

<!-- menu -->
<script src="../js/scrollPosStyler.min.js"></script>

</body>

</html>