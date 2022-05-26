<?php

	//Conexion con BD
	require 'conexion.php';
	session_start();
				
	$Usuario = $_POST['Usuario'];
	$pass = $_POST['Pass'];
	$rol = $_POST['Rol'];
	$_SESSION['user']=$Usuario;
	$_SESSION['rol']=$rol;
				
	if($Usuario==""){
		echo '<script>alert("No se escribio ningun usuario")</script>';
	}else if($pass==""){
		echo '<script>alert("No se escribio ninguna contraseña")</script>';
	}else{
	if($rol=="Docente"){
	    $q = "SELECT * FROM docente where ID_Docente = '$Usuario' and Pass = '$pass'";
	    $consulta = mysqli_query($con,$q);
		$array = mysqli_num_rows($consulta);
		if($array==1){
				?>
				<script>localStorage.setItem('user', <?php echo $Usuario;?>)
				window.location.replace("pagina1.html");;
				alert("¡Bienvenido!");</script> 
				<?php
			}
		else{
				echo '<script>alert("Datos incorrectos")</script>';
				$error=true;
				header("Location: index.php?error=$error");
			}
	}
	else{
		    $q = "SELECT * FROM alumno where ID_Alumno = '$Usuario' and Pass = '$pass'";
			$consulta = mysqli_query($con,$q);
			$array = mysqli_num_rows($consulta);
			if($array==1){
				?>
				<script>localStorage.setItem('user', <?php echo $Usuario;?>)
				window.location.replace("pagina1.html");;
				alert("¡Bienvenido!");</script> 
				<?php
			}else{
		    	echo '<script>alert("Datos incorrectos")</script>';
				$error=true;
				header("Location: index.php?error=$error");
			}
		}
		mysqli_close($con);
	}
?>

