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

    if($apellidoP==""){
        echo '<script>alert("No se escribio Apellido Paterno")</script>';
        header("location: formulario.php");
    }else if($nombre==""){
        echo '<script>alert("No se escribio el nombre")</script>';
        header("location: index.php");
    }else if($pass==""){
        echo '<script>alert("No se escribio ninguna contraseña")</script>';
        header("location: index.php");
    }else if($passc!=$pass){
        echo '<script>alert("Las contraseñas son diferentes")</script>';
        header("location: index.php");
    }else{
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
    }
?>