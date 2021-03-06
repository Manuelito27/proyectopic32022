<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('location: index.php');
    }
?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="estilos/estilomenu.css" type="text/css">
    <link rel="stylesheet" href="estilos/estiloscarrucel.css" type="text/css">
    <link rel="stylesheet" href="estilos/carrudos.css" type="text/css">
    <link rel="stylesheet" href="estilos/tabla.css" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Inicio</title>
</head>

<div class="nav-main">
    <!--BTN-->
    <input type="checkbox" class="nav-main__btn-collapse" id="nav-main__checkbox" />
    <label for="nav-main__checkbox" class="nav-main__btn-collapse-icon">
        <span class="icon-nav"></span>
        <span class="icon-nav"></span>
        <span class="icon-nav"></span>
    </label>
    <!--Box ed-->
    <div class="nav-main__btb-collapse-bg"></div>
    <!--redes-->
    <div class="social-networks">
        <a href="" target="_blank" target="_blank" class="social-networks__link-item">
            <i><img src="imagenes/face.png" width="15" height="15"></i>
            <a href="" target="_blank" class="social-networks__link-item">
                <i><img src="imagenes/telefono.png" width="15" height="15"></i>
            </a>
            <a href="" target="_blank" class="social-networks__link-item">
                <i><img src="imagenes/mundo.png" width="15" height="15"></i>
            </a>
            <a href="" target="_blank" class="social-networks__link-item">
                <i><img src="imagenes/tw.png" width="15" height="15"></i>
            </a>
    </div>
    <!--menu-->
    <div class="nav-main_menu">
        <a href="pagina1.html" class="nav-main__link-item">
            <i class="far fa-grin-bean"></i>
            Inicio
        </a>
        <a href="primero.html" class="nav-main__link-item">
            <i class="far fa-grin-bean"></i>
            Temas
        </a>
        <a href="apoyos.html" class="nav-main__link-item">
            <i class="far fa-grin-bean"></i>
            Apoyos
        </a>
        <a href="juegos.php" class="nav-main__link-item">
            <i class="far fa-grin-bean"></i>
            Juegos
        </a>
        <a href="logout.php" class="nav-main__link-item">
            <i class="far fa-grin-bean"></i>
            Salir
        </a>
    </div>
</div>


</div>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 style="text-align:center" class="center-aling titulo">
                Welcome activities
            </h1>

        </div>
    </div>
</div>
<div style="text-align:center; color: aliceblue;">
    <h2>Vocabulary</h2>
</div>
<br></br>

<div style="text-align:center">
    <div class="descripcion " style="color: aliceblue; padding-left: 160px; padding-right: 160px;">
        <br>Con el vocabulario visto en la secci??n de informaci??n se tendr?? que resolver la siguiente
        sopa de letras encontrando algunas de las palabras vistas anteriormente</br>
    </div>
    <br>
    <iframe width="795" height="690" frameborder="0"
        src="https://es.educaplay.com/juego/12215287-sopa_de_letras_vocabulario.html"></iframe>

</div>


<div>

</div>
<?php
            $conexion=mysqli_connect("localhost","root","","bdpic3");
            if(isset($_POST['enviar'])){
            if(!empty($_POST['nombre'])){
                $nombre=$_POST['nombre'];
                $nombret=$_POST['tarea'];
                if(!empty($_POST['id'])){
                   $id_maximo=$_POST['id'];
                    mysqli_query($conexion,"UPDATE tareas SET nombre='$nombre' WHERE id='$id_maximo'");
                   
                }else{
                    $sql=mysqli_query($conexion,"SELECT id FROM tareas WHERE nombre='$nombre'");
                    if($row=mysqli_fetch_array($sql)){
                        echo 'este ya esta :C';
                    }else{
                        
                   
                    mysqli_query($conexion,"INSERT INTO tareas (nombre) VALUES ('$nombre')");
                    $ss=mysqli_query($conexion, "SELECT MAX(id) as id_maximo FROM tareas");
                    if($rr=mysqli_fetch_array($ss)){
                        $id_maximo=$rr['id_maximo'];
                       
                    }
                }
            }
                
                $nameimagen=$_FILES['tarea']['name'];
                $tmpimagen=$_FILES['tarea']['tmp_name'];
                $urlnueva="Tareas/tarea_".$id_maximo.".jpg";
                if(is_uploaded_file($tmpimagen)){
                    copy($tmpimagen,$urlnueva);
                 
                }
            } 
        }  
        ?>

<div style="text-align: center; padding-left: 350px; padding-right: 350px;">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <label for="Name" style="color: aliceblue; font-size: 25px;">Nombre de la actividad:</label>
        <input type="text" name="tarea" size="50">
        <label for="Name" style="color: aliceblue; font-size: 25px;">Numero de lista:</label>
        <input type="text" name="nombre" size="50">
        <input type="submit" value="Enviar" name="enviar" />
        <input type="reset" value="Reiniciar" />
        <label for="Name" style="color: aliceblue; font-size: 10px;"></label>
        <input type="file" name="tarea" id="tarea1">

    </form>
</div>

<div>

    <table width="100%" rules="all">
        <thead>
            <td>Tarea</td>
            <td>Nombre</td>
            <td>Reintentar</td>
        </thead>
        <?php
                    if($_SESSION['rol']=='Alumno'){
                    $number = $_SESSION['user'];
                    $ss=mysqli_query($conexion,"SELECT * FROM tareas WHERE nombre  = $number");
                    while($rr=mysqli_fetch_array($ss)){
                ?>
        <tr>
            <td><img src="Tareas/tarea_<?php echo $rr['id'];?>.jpg" width="100px" height="100px"></td>
            <td>
                <?php echo $rr['nombre'];?>

            </td>
            <td>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $rr[0];?>">
                    <label  for="Name" style="color: #000;; font-size: 18px;">Nombre de la actividad:</label>
                    <input type="text" name="tarea" size="50">
                    <label for="Name" style="color: #000;; font-size: 18px;">Numero de lista:</label>
                    <input type="text" name="nombre" size="50" require value="<?php echo $rr['nombre']?>">
                    <input type="submit" value="Actualizar" name="enviar" />
                    <input type="reset" value="Reiniciar" />
                    <label for="Name" style="color: aliceblue; font-size: 10px;"></label>
                    <input type="file" name="tarea" id="tarea1">
                </form>
            </td>
            <td></td>
        </tr>
        <?php } 
                
            }else{
                
                $number = $_SESSION['user'];
                    $ss=mysqli_query($conexion,"SELECT * FROM tareas ORDER BY nombre");
                    while($rr=mysqli_fetch_array($ss)){
                ?>
        <tr>
            <td><img src="Tareas/tarea_<?php echo $rr['id'];?>.jpg" width="100px" height="100px"></td>
            <td>
                <?php echo $rr['nombre'];?>

            </td>
            <td>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $rr[0];?>">
                    <label for="Name" style="color: #000;; font-size: 18px;">Nombre de la actividad:</label>
                    <input type="text" name="tarea" size="50">
                    <label for="Name" style="color: #000;; font-size: 18px;">Numero de lista:</label>
                    <input type="text" name="nombre" size="50" require value="<?php echo $rr['nombre']?>">
                    <input type="submit" value="Actualizar" name="enviar" />
                    <input type="reset" value="Reiniciar" />
                    <label for="Name" style="color: aliceblue; font-size: 10px;"></label>
                    <input type="file" name="tarea" id="tarea1">
                </form>
            </td>
            <td></td>
        </tr>
        <?php }
                
            }?>
    </table>
</div>
<script src="jss/mainn.js"></script>
</body>

</html>