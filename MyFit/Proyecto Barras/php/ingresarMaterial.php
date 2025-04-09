<?php
    include 'conexion.php';
    
    $tipoMaterial = $_POST['tipoMaterial'];
    $cantidad = $_POST['cantidad'];
    
 
    if($tipoMaterial === "BarrasM"){
         $query = "UPDATE materiales SET cantidadMaterial = cantidadMaterial + $cantidad WHERE idMaterial=1";
         
    }
    else{
        $query = "UPDATE equipo SET cantidadEquipo = cantidadEquipo + $cantidad WHERE nombreEquipo = '$tipoMaterial'";
    }
    $ejecutar = mysqli_query($conexion, $query);
    
    if($ejecutar){
        echo '
            <script>
                alert("Se actualizaron los materiales");
                window.location = "../index.php";
            </script>
                
        ';
    }else{
        echo '
            <script>
                alert("No se actualizaron los materiales");
                window.location = "../index.php";
            </script>
        ';
    }
    
