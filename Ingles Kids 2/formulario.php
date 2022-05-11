<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario Registro</title>
<link rel="stylesheet" href="estilos/estilos.css" type="text/css">
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
			<form action="form.php" method="post">
				<label>Apellido Paterno</label>
				<input type="text" name="ApellidoP" value="" placeholder="Apellido Paterno"><br/>
				<label>Apellido Materno</label>
				<input type="text" name="ApellidoM" value="" placeholder="Apellido Materno"><br/>
				<label>Nombre</label>
				<input type="text" name="Nombre" value="" placeholder="Nombre"><br/>
				<label>Contraseña</label>
				<input type="text" name="Pass" value="" placeholder="Contraseña"><br/>
				<label>Confirmacion de contraseña</label>
				<input type="text" name="PassC" value="" placeholder="Confirmar contraseña"><br/>
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
					<button type="submit" name="">Registrar</button>
				</div>
			</form>
		</div>
	</section>
</body>
</html>
