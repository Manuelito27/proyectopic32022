<?php

	//Conexion con BD
	require 'conexion.php';
	session_start();
				
	$Usuario = $_POST['Usuario'];
	$pass = $_POST['Pass'];
	$rol = $_POST['Rol'];
				
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
			header("location: pagina1.html");
		}else{
			echo '<script>alert("Datos incorrectos")</script>';
		}
		}else{
		    $q = "SELECT * FROM alumno where ID_Alumno = '$Usuario' and Pass = '$pass'";
			$consulta = mysqli_query($con,$q);
			$array = mysqli_num_rows($consulta);
			if($array==1){
				header("location: pagina1.html");
			}else{
		    	echo '<script>alert("Datos incorrectos")</script>';
			}
		}
		mysqli_close($con);
	}
?>

