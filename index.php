<!DOCTYPE html>
<?php require('conexion.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario</h1>
    <form name="Contacto" action="index.php" method="POST">
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" required><br>
        <label for="correo">Correo</label><br>
        <input type="email" name="correo"><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if (!empty($_POST['nombre']) && !empty($_POST['correo'])) {
            echo "Recibe el nombre: " . $_POST['nombre'] . "<br>";
            echo "Recibe el correo: " . $_POST['correo'] . "<br>";

            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            
            //--- Aplicable a Sentencias INSERT, UPDATE, DELETE ---//
            $sql = "INSERT INTO usuarios (nombre, correo)
            VALUES ('$nombre', '$correo')";
            
            // Utilizar exec() dado que no se regresan resultados
            $conn->exec($sql);
            
            //------------------------------------//
            //--- Aplicable a Sentencia SELECT ---//
            
            $sql = "SELECT * FROM usuarios";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Configura los resultados como un arreglo asociativo
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            // $stmt->fetchAll() Obtiene el arreglo asociativo
            echo "<ul>";
            foreach ($stmt->fetchAll() as $row) {
                echo "<li>" . $row['id'] . ": " . $row['nombre'] . " " . $row['correo'] . " ";
            }
            echo "</ul>";
        } else {
            echo "<h3>Faltan datos</h3>";
        }
    ?>
</body>
</html>