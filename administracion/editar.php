<?php
include("../registro/connect_db.php");

//recibir los datos y almacenarlos en variables
if(!empty($_POST))
{
	$alert = '';
	if(empty($_POST['run']) || empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['telefono']) || empty($_POST['rol']))
	{
		$alert = '<p>Todos los campos son obligatorios.</p>';
	}else{

    $idusuario = $_POST['id'];
    $run = $_POST['run'];
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$pass = md5($_POST['pass']);
    $rol = $_POST['rol'];
    
	//verificar que el run y email no este duplicado

	$query = mysqli_query($conexion, "SELECT * FROM usuario 
                                        WHERE (run = '$run' AND id != $idusuario)
                                        OR (email = '$email' AND id != $idusuario)");
	$result = mysqli_fetch_array($query);

	if ($result > 0){
		$alert = '<p> El correo o run ya esta registrado. </p>';
	}else{

        if (empty($_POST['pass']))
        {
            $sql_update=mysqli_query($conexion,"UPDATE usuario
                                                    SET run = '$run', nombre = '$nombre', email = '$email', telefono = '$telefono', roles_id = '$rol'
                                                    WHERE id = $idusuario");
            }else{
                $sql_update=mysqli_query($conexion,"UPDATE usuario
                                                    SET run = '$run', nombre = '$nombre', email = '$email', telefono = '$telefono', pass = '$pass' , roles_id = '$rol'
                                                    WHERE id = $idusuario");
            }
	//ejecutar consulta
	
	if($sql_update){
		$alert = '<p> Usuario Actualizado. </p>';
			
		}else{
		$alert = '<p> Error al Actualizar el usuario </p>';
			
			}
		}
	}
}

// Mostrar datos

if(empty($_GET['id']))
{
    header('location:admin.php');
}
//guardamos la variable id de la tabla usuario
$iduser = $_GET['id'];
//hacemos la sentencia sql
$sql = mysqli_query($conexion,"SELECT u.id, u.run, u.nombre, u.email, u.telefono, (u.roles_id) as roles_id, (r.rol) as rol_nombre 
                                FROM usuario u 
                                INNER JOIN roles r 
                                ON u.roles_id = r.id 
                                WHERE u.id = $iduser");

$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
    header('location:admin.php');
}else{
    $option = '';
    while($data = mysqli_fetch_array($sql)){
        $iduser     = $data['id'];
        $run        = $data['run'];
        $nombre     = $data['nombre'];
        $email      = $data['email'];
        $telefono   = $data['telefono'];
        $idrol      = $data['roles_id'];
        $rol        = $data['rol_nombre'];


        if($idrol == 1){
            $option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
        }else if($idrol == 2){
            $option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
        }else if($idrol == 3){
            $option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
        }
    }
}



?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Estilos perzonalizados-->
    <link rel="stylesheet" href="../css/stylos.css">
    <link rel="stylesheet" href="../css/stylo_admin.css">
    <link rel="stylesheet" href="../css/administracion2.css">
    <link rel="stylesheet" href="../css/footer.css">


    
    <title>Municipalidad de Hualpén</title>
</head>
<body>
   <!-- MENU -->
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
          <li class="nav-item active letras-menu">
            <a class="nav-link" href="admin.php">Panel de control<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link letras-menu" href="../proyectos/proyectos-totales.html">Proyectos</a>
          </li>
          <li class="nav-item letras-menu active">
            <a class="nav-link" href="../concejomuni/concejomuni.html">Entradas</a>
          </li> 
          <li class="nav-item letras-menu active">
            <a class="nav-link" href="../concejomuni/alcaldesa.html">Usuarios</a>
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
            <a class="nav-link" href="proyectos/proyectos-totales.html">Proyectos Totales</a>
          </li>
          
          <li class="nav-item espacio-ingresar active " >
            <a class="nav-link btn  boton-ingresar-naranjo "  href="../index.html">Municipalidad</a>
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
              <a class="dropdown-item" href="admin.3.html">Agregar Proyecto</a>
              <a class="dropdown-item" href="admin1.php">Agregar Usuario</a>
              <a class="dropdown-item" href="admin.php">Usuarios</a>
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
<section class="formulario-admininis2">
    <h4>Actualizar Registro</h4>
    <div><?php echo isset($alert)? $alert : ''; ?></div>

  <form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $iduser; ?>"> 
    <p for="run" class="p-editar">RUT (12345678-9): </p>
    <input class="input-editar" type="run"      name="run"               id=""   placeholder="Ingrese RUT representante 12345678-9:" value="<?php echo $run;?>">
    <p for="nombre" class="p-editar"> Nombre: </p>
    <input class="input-editar" type="nombre"   name="nombre"            id=""   placeholder="Ingrese Nombre" value="<?php echo $nombre;?>">
    <p for="email" class="p-editar"> Email:

    </p>
    <input class="input-editar" type="email"    name="email"             id=""   placeholder="Ingrese Correo" value="<?php echo $email;?>">
    <p for="telefono" class="p-editar"> Telefono:</p>
    <input class="input-editar" type="number"   name="telefono"          id=""   placeholder="Ingrese Telefono" value="<?php echo $telefono;?>">
    <p for="password" class="p-editar">Contraseña: </p>
    <input class="input-editar" type="password" name="pass"              id=""   placeholder="Ingrese su Contraseña">
    <p for="password" class="p-editar"> Repita contraseña: </p>
    <input class="input-editar" type="password" name="rpass"             id=""   placeholder="Ingrese Nuevamente su Contraseña">
    <p for="rol" class="p-editar">Escoja un Rol:</p>

    <?php
     $query_rol=mysqli_query($conexion,"SELECT*FROM roles");
     $result_rol= mysqli_num_rows($query_rol);
    
    ?>

    <select name="rol" id="rol" class="notItemOne"> 
        <?php 
        echo $option;
        if($result_rol > 0)
        {
            while ($rol = mysqli_fetch_array($query_rol)){
        ?>      
        <option value="<?php echo $rol["idrol"];?>"><?php echo $rol["rol"]?></option> 
        <?php 
            }
        }
        ?>
      </select>


    



       
        <a href="../index2.html">
        <input class="boton1" type="submit" name="submit" value="Actualizar Usuario">
        </a>
    
    <input class="boton2" type="reset">
       
        </div>
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