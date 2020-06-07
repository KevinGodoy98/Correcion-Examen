<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Capitulo</title>
 <style type="text/css" rel="stylesheet">
 .error{
 color: red;
 }
 </style>
</head>
<body>

<?php
 //incluir conexión a la base de datos
 include 'ConexionBD.php';

 $numCapitulos = isset($_POST["numcapitulo"]) ? mb_strtoupper(trim($_POST["numcapitulo"]), 'UTF-8') : null;
 $titulo= isset($_POST["titulo"]) ? mb_strtoupper(trim($_POST["titulo"]), 'UTF-8') : null;  
 $codigoLibro = isset($_POST["libro"]) ? trim($_POST["libro"]) : null; 
 $codigoAutor = isset($_POST["autor"]) ? trim($_POST["autor"]) : null;   

 $sql = "INSERT INTO Capitulos VALUES (0,'$numCapitulos','$titulo','$codigoLibro','$codigoAutor')";        
    

 if ($conn->query($sql) === TRUE ) {
 echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>El capitulo con ese codigo $codigoCapitulo ya esta registrado en el sistema </p>";
 }else{
 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 }
 }
 //cerrar la base de datos
 $conn->close();
 ?>
</body>
</html>