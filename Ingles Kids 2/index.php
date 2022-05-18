<!doctype html>
<html>
<head>
<link rel="stylesheet" href="estilos/formulario.css" type="text/css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<meta charset="utf-8">
<title>index</title>
</head>
<body>
	<section class="formulario">
			<div class="alerta ocultar" id="alerta">
				<div class="alerta-bg"> <i class='fas fa-exclamation-triangle'></i></div>
				<span id="alerta-text">Por favor ingresa un usuario y contraseña.</span>
				<i class="fas fa-times close" onclick="ocultar(this.id)" name=""></i>
			</div>
			<div  class="alerta ocultar datos " id="alerta-datos">
				<div class="alerta-bg"> <i class='fas fa-exclamation-triangle'></i></div>
				<span id="alerta-text">Datos incorrectos.</span>
				<i class="fas fa-times close" onclick="ocultar()" name=""></i>
			</div>
		<div class="formulario-login">
			<div class="formulario_bienvenida">
				<img src="imagenes/logo.jpeg" alt="Logo" class="Logo">
				<h1 class="LogoTexto">Bienvenido al sitio!</h1>
				<img src="imagenes/ninio.jpg" alt="Logoninio" class="Logoninio">
			</div>
			<div class="formulario_contenido">
				<img src="imagenes/avatar.png" class="userform">
				<div class="formulario_contenido2">
					<form action="user.php" id="formulario" method="post">
						<label>Usuario</label>
						<input type="text" name="Usuario" id="Usuario" value="" placeholder="Usuario"><br/>
						<label>Contraseña</label>
						<input type="password" name="Pass" id="Pass" value="" placeholder="Contraseña"><br/>
						<label>Cuenta</label>
						<select name="Rol">
							<option>Alumno</option>
							<option>Docente</option>
						</select>
						<br/>
						<div class="formulario_contenidobuttons">
						<button type="button" onclick="subir()" name="">Ingresar</button>
						<button type="button" onclick="abrir()" name="">Registrarse</button>
						<script>
							if(<?php $error = isset($_GET["error"]); echo json_encode($error); ?>)
							{
								let alertaDatos=document.getElementById("alerta-datos");
								alertaDatos.classList.remove("ocultar");
							}
							function abrir(){
								window.open("formulario.php");
							}
							function ocultar(){
								let alerta=event.srcElement.parentNode;
								alerta.classList.add("ocultar");
							}
							function subir()
							{
								let alerta=document.getElementById("alerta");
								let formu=document.getElementById("formulario");
								let usuario=document.getElementById("Usuario").value;
								let pass=document.getElementById("Pass").value;
								if(pass=="" || usuario=="")
								{
									alerta.classList.remove("ocultar");
								}
								else{
									formu.submit();
								}
							}
						</script>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
