<?php
include("registro/connect_db.php");

//iniciamos sesion
session_start();

if(isset($_POST['submit'])){
//llamamos variables
$email = $_POST['email'];
$password = $_POST['pass'];
$pass = md5($password);
$rol_id = $_POST["rol_id"];
//verificamos que usuario y pass sean el mismo
$consulta1 = "SELECT*FROM usuario 
                    WHERE email='$email' AND pass = '$pass'";

$resultado1=mysqli_query($conexion,$consulta1);
$valor1 = mysqli_fetch_array($resultado1);

//ahora con esta consulta valido si usuario está en el domino del rol_id
$consulta2 = "SELECT*FROM usuario WHERE email='$email' AND roles_id='$rol_id'";

$resultado2=mysqli_query($conexion,$consulta2);
$valor2 = mysqli_fetch_array($resultado2);
 
//aqui preguntamos si la ID es concordante con el tipo de usuario seleccionado
if($valor2['roles_id']==1){
  header("location:administracion/admin.php");
}else
if($valor2['roles_id']==2){
  header("location:organizaciones/completarre.php");
}
else{
?>
<script>
  alert("Hola que tal");
</script>



<html>
  <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>
</html>

<?php
   
  }
}


mysqli_close($conexion);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Estilos perzonalizados-->
  <link rel="stylesheet" href="css/stylos.css">
  <link rel="stylesheet" href="css/loggin.css">
  

  
  <title>Municipalidad de Hualpén</title>
</head>

<body class="body">
<div class="modal-dialog text-center"> 
    <div class="col-12 main-section">
        <div class="modal-content">
         

          <form class="col-12" action=""  method="POST" >
            <div class="form-group" id="user-group">
              <input class="form-control" type="text" placeholder="Correo electronico" name="email">

            </div>
            <div class="form-group" id="contraseña-group">
              <input class="form-control" type="password" placeholder="Contraseña" name="pass">
            </div>

            <div>
            
              <!-- DROOPDOWN -->
<div class="btn-group">
  <button type="button" class="btn btn-danger2  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Seleccione su Rol
  </button>
  
  <div class="dropdown-menu" name="rol_id">
    <a class="dropdown-item" href="#" value="1">Administrador</a>
    <a class="dropdown-item" href="#" value="2">Organización</a>
  </div>
  
</div>    <!--
            <label> Seleccione su rol</label>
            <select name="rol_id" >
          <option value="1">Administrador</option> 
          <option value="2">Organizacion</option>
          </select>
            </div>
-->
                <!-- BOTON PARA INGRESAR A LA PAGINA -->
                <br>
            <input class="btn btn-primary" type="submit" value="Ingresar" name="submit">
             
             <a href="registro/registro.php" class="btn btn-primary">Registrarse</a>
             
             <a href="recuperarpas.php" class="btn btn-primary">Recuperar contraseña</a>
          </form>
          <div class="col-12 forgot">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <a href="" class="recordarpass">¿Recordar Contraseña?</a>
          </div>

        </div>
    </div>
</div>


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
<script src="js/bootstrap.js"></script>

<!-- menu -->
<script src="js/scrollPosStyler.min.js"></script>

</body>

</html>

