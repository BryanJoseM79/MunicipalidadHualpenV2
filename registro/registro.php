<?php


//recibir los datos y almacenarlos en variables
if(!empty($_POST))
{
	$alert = '';
	if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['telefono']) || empty($_POST['pass']) || empty($_POST['rol']))
	{
		$alert = '<p>Todos los campos son obligatorios.</p>';
	}else{

    include "connect_db.php";

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Estilos perzonalizados-->
    <link rel="stylesheet" href="../css/stylo_registro.css">
    <link rel="stylesheet" href="../css/stylos.css">
    <title>Municipalidad de Hualpén</title>
</head>
<body>
    <!-- MENU -->
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
            <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../somos.html">Somos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Servicios
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">SOLCITUD DE VIVIENDA</a>
              <a class="dropdown-item" href="#">SOLICIUTD DE BONO</a>
              <a class="dropdown-item" href="#">SOLICIUTD DE BONO</a>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Sucursales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li>
          <li class="nav-item espacio-ingresar">
            <a class="nav-link btn btn-dark "  href="../index.html">Ingresar</a>
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

<section class="formulario_de_registro">
    <h4>Formulario de Registro</h4>
    <div><?php echo isset($alert)? $alert : ''; ?></div>
  <form action="" method="POST">
    <input class="controls" type="nombre"   name="nombre"            id=""   placeholder="Ingrese su Nombre">
    <input class="controls" type="email"    name="email"             id=""   placeholder="Ingrese su Correo">
    <input class="controls" type="number"   name="telefono"          id=""   placeholder="Ingrese su Telefono">
    <input class="controls" type="password" name="pass"              id=""   placeholder="Ingrese su Contraseña">
    <input class="controls" type="password" name="rpass"             id=""   placeholder="Ingrese Nuevamente su Contraseña">
    <label for="rol">Escoja un Rol:</label>
    <select name="rol"> 
    <option value="1">Administrador</option>
    <option value="2">Organizacion</option>
      </select>
        <p>Estoy de acuerdo con 
            <a href="">Terminos y Condiciones</a> 
        </p>
        <a href="../index2.html">
        <input class="boton1" type="submit" name="submit" value="Registrarse">
        </a>
    
    <input class="boton2" type="reset">
        <p>
          <a href="../login.php">¿Ya tengo cuenta?</a>  
        </p>
  </form>
</section>

<footer>

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