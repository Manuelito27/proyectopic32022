<?php
    //Conexion con BD
    echo "Si entro aca xd";

    $apellidoP = $_POST['ApellidoP'];
    $apellidoM = $_POST['ApellidoM'];
    $nombre = $_POST['Nombre'];
    $pass = $_POST['Pass'];
    $passc = $_POST['PassC'];
    $rol = $_POST['Rol'];
    $genero = $_POST['Genero'];
    $id="5";

    if($passc!=$pass){
        echo "LA contraseña no es igual";
    }else{
        echo "xd";
    }

    $con=mysqli_connect('localhost','root','','bdpic3') or die('Error de conexion con el servidor');
    /*if($rol=="Docente"){
        $id=rand(100000, 999999);
    }else{
        $id=rand(1000000000, 9999999999);
    }

    echo $id;
    */
    $sql = "INSERT INTO docente (ID_Docente,Nombre,ApellidoP,ApellidoM,Pass)
    VALUES ('"$id"','"$nombre"','"$apellidoP"','"$apellidoM"','"$pass"')";

    $resultados = mysqli_query($con,$sql) or die('Error en la database');
    mysqli_close($con);
?>