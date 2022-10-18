<?php 
include 'conexion.php';
//*! Si existe una peticion de tipo post por parte del fomulario
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	//*! Se guarda la informacion que el usuario ingresa
	$usuario = $_POST['usuario'];
	$contra = $_POST['pass'];
	//*! se hace la consulta a la base de datos.
	$instruccion = "SELECT * FROM tb_usuarios WHERE  usuario = '$usuario' and contraseña = '$contra'";
	$query = mysqli_query($conexion, $instruccion);
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$contador = mysqli_num_rows($query);

	//*! si en la consulta se obtiene un valor entonces el usuario existe
	if ($contador == 1) {
		//*! Se inicia sesion y se guardan los datos que se desea, para poder utilizarlos mientras la sesion este activa
		session_start();
		$_SESSION['rol'] = $result['rol'];
		$_SESSION['nombreUsuario'] = $result['nombre']. " " .$result['apellido'] ;
		$_SESSION['usuario'] = $usuario;
		header('location: dashboard/index.php');
	}else
	{
		$contador == 0;
	}
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ingresar a Sheyavoh</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/logutil.css">
	<link rel="stylesheet" type="text/css" href="assets/css/logmain.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/colorear.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="">
					<span class="login100-form-logo">
						<img src="assets/img/logo_Sheyavoh.png" class="logo_log">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Iniciar Sesión
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text"placeholder="Usuario" name="usuario">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password"placeholder="Contraseña" name="pass">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Ingresar
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--==============================================================================================-->
	
	<script src="assets/js/login.js"></script>

</body>
</html>