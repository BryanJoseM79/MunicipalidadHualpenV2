<?php
include("../registro/connect_db.php");

//recibir los datos y almacenarlos en variables
if(!empty($_POST))
{
	$alert = '';
	if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['telefono']) || empty($_POST['pass']) || empty($_POST['rol']))
	{
		$alert = '<p>Todos los campos son obligatorios.</p>';
	}else{

    include "../registro/connect_db.php";

	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$pass = md5($_POST['pass']);
	$fecha_reg = date("d/m/y");
	$rol = $_POST['rol'];
	//verificar que el email no este duplicado
		
	$query = mysqli_query($conexion, "SELECT * FROM usuario WHERE email = '$email'");
	$result = mysqli_fetch_array($query);

	if ($result > 0){
		$alert = '<p> El correo ya esta registrado. </p>';
	}else{

	//consulta para insertar
	$query_insert = mysqli_query($conexion, "INSERT INTO usuario(nombre, email, telefono, pass, fecha_reg, roles_id)
				VALUES ('$nombre','$email','$telefono','$pass','$fecha_reg','$rol')");
	//ejecutar consulta
	
	if($query_insert){
		$alert = '<p> Usuario Creado. </p>';
			
		}else{
		$alert = '<p> Error al crear el usuario </p>';
			
			}
		}
	}
}
	//cerrar conexion
  mysqli_close($conexion);
  
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
  <link rel="stylesheet" href="../css/stylo_admin.css">
  <link rel="stylesheet" href="../css/administracion2.css">
  

  
  <title>Municipalidad de Hualpén</title>
</head>

<body>

<!-- MENU  -->
  <nav class="navbar navbar-expand-lg navbar-dark  fixed-top sps sps--abv">
    <div class="container">
      <a class="navbar-brand" href="../index.html">
        <img class="logotipo" src="../img/unnamed (1).png" alt="logo-municipalidad">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.html"> Panel de Control <span class="sr-only">(current)</span></a>
          </li>
          <!--<li class="nav-item espacio-ingresar"> BOTON PARA SALIR
            <a class="nav-link btn btn-dark "  href="../registro/salir.php">Salir</a>-->
          <li class="nav-item">
            <a class="nav-link" href="../index.html">Paginas</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#" id="navbarDropdown" role="button">
              Entradas
            </a>
            
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Usuarios</a>
          </li>
          
          <li class="nav-item espacio-ingresar">
            <a class="nav-link btn btn-dark "  href="../index.html">Municipalidad</a>
          </li>
          <li>
            <img class="logotipo-redes-sociales" src="../img/facebook-logo-button.svg" alt="Facebook" >
            <img class="logotipo-redes-sociales" src="../img/instagram-logo.svg" alt="Instagram">
            <img class="logotipo-redes-sociales" src="../img/twitter-logo-button.svg" alt="Twitter">
          </li>
        </ul>
      </div>
    </div>
    
  </nav>
  <!-- FINAL DEL MENU-->

<header id="header">
  <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
              <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
            </svg>
            Panel de Control <small>Administre su sitio</small></h1>
          
        </div>
        <div class="col-md-2">
          <div class="dropdown crear">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Crear contenido
            </a>
          
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Agregar Pagina</a>
              <a class="dropdown-item" href="#">Agregar Entrada</a>
              <a class="dropdown-item" href="#">Agregar Usuario</a>
            </div>
          </div>
        </div>
      </div>
  </div>
</header>


  
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <ul class="list-group">
              <li class="list-group-item active color-principal">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                  <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
                </svg>
                Panel de Control
              </li>
              <a href="" class="list-group-item">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-filter-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                  <path fill-rule="evenodd" d="M6 11.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                </svg>
                Paginas
                <span class="badge">28</span></a>
              <a href="" class="list-group-item">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg>
               Postulaciones
               <span class="badge">14</span></a>
              <a href="" class="list-group-item">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                </svg>
                Usuarios
                <span class="badge">108</span></a>

                <div class="well">
                  <h4>Espacio en Disco</h4>
                    <div class="progress">
                      <div class="barra-progreso" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:40%">40%</div>
                      </div>
                      <h4>Ancho de banda</h4>
                    <div class="progress">
                      <div class="barra-progreso" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:75%">75%</div>
                      </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <section class="formulario-admininis">
                    <div><?php echo isset($alert)? $alert : ''; ?></div>
                    <form action="" method="POST">
                            <label class="">Ingrese nombre:</label>
                            <input class="controls" type="nombre"   name="nombre"            id=""   placeholder="Ingrese su Nombre">
                            <label class="">Ingrese Correo:</label>
                            <input class="controls" type="email"    name="email"             id=""   placeholder="Ingrese su Correo">
                            <label class="">Ingrese Telefono:</label>
                            <input class="controls" type="number"   name="telefono"          id=""   placeholder="Ingrese su Telefono">
                            <label class="">Ingrese Contraseña:</label>
                            <input class="controls" type="password" name="pass"              id=""   placeholder="Ingrese su Contraseña">
                            <label class="">Ingrese nuevamente su contraseña:</label>
                            <input class="controls" type="password" name="rpass"             id=""   placeholder="Ingrese Nuevamente su Contraseña"><br>
                            <label for="rol">Escoja un Rol:</label><br>
                            <select name="rol"> 
                              <option value="1">Administrador</option>
                              <option value="2">Organizacion</option>
                            </select>
                           
                            <a href="../index2.html">
                            <input class="boton1" type="submit" name="submit" value="Registrarse">
                            </a>
                        <input class="boton2" type="reset">
                      </form>
                    </section>
                      </div>
                  </div>
                </div>
            </ul>
          </div>
        </div>
      </div>
    </section>





  <footer class="footersep">

    <img class="logotipo-footer" src="../img/unnamed (1).png" alt=""> <br>
    <img class="logotipo-redes-sociales" src="../img/facebook-logo-button.svg" alt="Facebook">
    <img class="logotipo-redes-sociales" src="../img/instagram-logo.svg" alt="Instagram">
    <img class="logotipo-redes-sociales " src="../img/twitter-logo-button.svg" alt="Twitter">

    <p class="altura-footer"> "Lenga, verdadero sabor de mar"

    </p>
  </footer>

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