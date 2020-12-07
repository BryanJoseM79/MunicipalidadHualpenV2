<?php
include("connect_db.php");

//recibir los datos y almacenarlos en variables
if(!empty($_POST))
{
	$alert = '';
	if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['telefono']) || empty($_POST['pass']) || empty($_POST['rol']))
	{
		$alert = '<p>Todos los campos son obligatorios.</p>';
	}else{

	
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$pass = md5($_POST['pass']);
	$fecha_reg = date("y-m-d");
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