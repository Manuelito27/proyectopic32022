<!doctype html>
<html>
<head>
<link rel="stylesheet" href="estilos/formulario.css" type="text/css">
<meta charset="utf-8">
<title>index</title>
</head>
<body>
	<section class="formulario">
		<div class="formulario-login">
			<div class="formulario_bienvenida">
				<img src="imagenes/logo.jpeg" alt="Logo" class="Logo">
				<h1 class="LogoTexto">Bienvenido al sitio!</h1>
				<img src="imagenes/ninio.jpg" alt="Logoninio" class="Logoninio">
			</div>
			<div class="formulario_contenido">
				<img src="imagenes/avatar.png" class="userform">
				<div class="formulario_contenido2">
					<form action="" method="post">
						<label>Usuario</label>
						<input type="text" name="Usuario" value="" placeholder="Usuario"><br/>
						<label>Contraseña</label>
						<input type="text" name="Pass" value="" placeholder="Contraseña"><br/>
						<label>Cuenta</label>
						<select name="Rol">
							<option>Alumno</option>
							<option>Docente</option>
						</select>
						<br/>
						<div class="formulario_contenidobuttons">
							<button type="submit" name="">Ingresar</button>
							<a class="mueveme" href="formulario.html">
								<button type="submit" name="">Registrarse</button>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

</body>
</html>
