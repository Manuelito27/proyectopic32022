<?php
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

    if($passc!=$pass){
        alert("MENSAJE");
    }else{
        if($rol=="Docente"){
            $sql = "INSERT INTO docente (Nombre,ApellidoP,ApellidoM,Pass)
            VALUES ('$nombre','$apellidoP','$apellidoM','$pass')";
        }else{
            $sql = "INSERT INTO alumno (Nombre,ApellidoP,ApellidoM,Pass)
            VALUES ('$nombre','$apellidoP','$apellidoM','$pass')";
        }
        $resultados = mysqli_query($con,$sql) or die('Error en la database');
        mysqli_close($con);
    }
?>