<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Formulario Registro</title>
<link rel="stylesheet" href="estilos/estilos.css" type="text/css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
	<div class="barritachida">
		<img src="imagenes/logo.jpeg" alt="Logo" class="Logo2">
	</div>
	<section class="content">
		<div class="untexto">
			<label>Crear cuenta</label>
		</div>
		
		<div class="formulario_registro">
		
		<!--
			Esta parte se debe modificar porque esta raro xd
		-->
		<?php
			if(isset($_POST["btnSubmit"])){
				//Conexion con BD
				require 'conexion.php';
				session_start();
				
				$apellidoP = $_POST['ApellidoP'];
				$apellidoM = $_POST['ApellidoM'];
				$nombre = $_POST['Nombre'];
				$pass = $_POST['Pass'];
				$passc = $_POST['PassC'];
				$rol = $_POST['Rol'];
				$genero = $_POST['Genero'];

				// if($apellidoP==""){
				// 	echo '<script>alert("No se escribio Apellido Paterno")</script>';
				// }else if($nombre==""){
				// 	echo '<script>alert("No se escribio el nombre")</script>';
				// }else if($pass==""){
				// 	echo '<script>alert("No se escribio ninguna contraseña")</script>';
				// }else if($passc!=$pass){
				// 	echo '<script>alert("Las contraseñas son diferentes")</script>';
				// }else{
					if($rol=="Docente"){
						$sql = "INSERT INTO docente (Nombre,ApellidoP,ApellidoM,Pass)
						VALUES ('$nombre','$apellidoP','$apellidoM','$pass')";
					}else{
						$sql = "INSERT INTO alumno (Nombre,ApellidoP,ApellidoM,Pass)
						VALUES ('$nombre','$apellidoP','$apellidoM','$pass')";
					}
					$resultados = mysqli_query($con,$sql) or die('Error en la database');
					header("location: index.php");
					mysqli_close($con);
				// }
			}	
		?>
			<div class="alerta ocultar " id="alerta">
				<div class="alerta-bg"> <i class='fas fa-exclamation-triangle'></i></div>
				<span id="alerta-text">Por favor ingresa un usuario y contraseña.</span>
				<i class="fas fa-times close" onclick="ocultar(this.id)" name=""></i>
			</div>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formulario">
				<label>Apellido Paterno</label>
				<input type="text" name="ApellidoP" id="ApellidoP" value="" placeholder="Apellido Paterno"><br/>
				<label>Apellido Materno</label>
				<input type="text" name="ApellidoM" id="ApellidoM" value="" placeholder="Apellido Materno"><br/>
				<label>Nombre</label>
				<input type="text" name="Nombre" id="Nombre" value="" placeholder="Nombre"><br/>
				<label>Contraseña</label>
				<input type="password" name="Pass" id="Pass" value="" placeholder="Contraseña"><br/>
				<label>Confirmacion de contraseña</label>
				<input type="password" name="PassC" id="PassC" value="" placeholder="Confirmar contraseña"><br/>
				<label>Rol de Usuario</label>
				<select name="Rol">
					<option>Alumno</option>
					<option>Docente</option>
				</select>
				<br/>
				<label>Genero</label>
				<select name="Genero">
					<option>Masculino</option>
					<option>Femenino</option>
				</select><br/>
				<div class="formulario_contenidobuttons">
					<button type="button" onclick="subir()" name="btnButton">Registrar</button>
					<button type="submit" id="btnSubmit" name="btnSubmit" hidden></button>

				</div>
			</form>
		</div>
	</section>
	<script src="jss/submitRegisterForm.js"></script>
	<script>
           if(localStorage.user)
		   {
			window.location.replace("pagina1.html");
		   }

	</script>
</body>
</html>
