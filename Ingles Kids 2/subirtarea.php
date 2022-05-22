<?php
          if(array_key_exists('tarea', $_POST)) {
         
        
            $conexion=mysqli_connect("localhost","root","","tareas");
            if(!empty($_POST['nombre'])){
                $nombre=$_POST['nombre'];
                $nombret=$_POST['tarea'];
           


                if(!empty($_POST['id'])){
                   $id_maximo=$_POST['id'];
                    mysqli_query($conexion,"UPDATE actividades SET nombre='$nombre' WHERE id='$id_maximo'");
                    echo 'se actualizo la tarea';
                }else{
                    $sql=mysqli_query($conexion,"SELECT id FROM actividades WHERE nombre='$nombre'");
                    if($row=mysqli_fetch_array($sql)){
                        echo 'este ya esta :C';
                    }else{
                        
                   
                    mysqli_query($conexion,"INSERT INTO actividades (nombre) VALUES ('$nombre')");
                    $ss=mysqli_query($conexion, "SELECT MAX(id) as id_maximo FROM actividades");
                    if($rr=mysqli_fetch_array($ss)){
                        $id_maximo=$rr['id_maximo'];
                       
                    }
                    echo "se a realisado el registro de la tarea con exito";
                }
            }
                
                $nameimagen=$_FILES['tarea']['name'];
                $tmpimagen=$_FILES['tarea']['tmp_name'];
                $urlnueva="Tareas/tarea_".$id_maximo.".jpg";
                if(is_uploaded_file($tmpimagen)){
                    copy($tmpimagen,$urlnueva);
                    echo 'se hizo';
                }else{
                    echo 'no se hizo';

                }
                    

            
              
            } 


        }

                
        ?>