<?php 
include('conexion.php');

    //validar que la cosa [$_POST["nombre"]] este seteada en la pagina, si si existe valida y entra, sino no entra
    if(!empty($_POST["nombre"]) && !empty($_POST["correo"])){
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];

        //--- Aplicable a Sentencias INSERT, UPDATE, DELETE ---//

        $sql = "INSERT INTO usuarios (nombre, correo) 
                VALUES ('$nombre', '$correo')";
            
        // Utilizar exec() dado que no se regresan resultados
        $conn->exec($sql);

        header('Location: index.php');
    }
    else{
        echo "<h2> Falta informcion </h2>";
    }
?>