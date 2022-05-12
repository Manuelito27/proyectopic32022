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
        echo 'No se escribio Apellido Paterno';
    }else if($nombre==""){
        echo 'No se escribio un nombre';
    }else if($pass==""){
        echo 'No se escribio ninguna contraseña';
    }else if($passc!=$pass){
        echo 'Las contraseñas no son iguales';
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