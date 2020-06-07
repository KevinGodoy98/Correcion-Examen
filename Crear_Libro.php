<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Libro</title>
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

 $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
 $ISBN= isset($_POST["isbn"]) ? mb_strtoupper(trim($_POST["isbn"]), 'UTF-8') : null;
 $numPaginas = isset($_POST["numpagina"]) ? mb_strtoupper(trim($_POST["numpagina"]), 'UTF-8') : null;
 $numCapitulos = isset($_POST["numcapitulo"]) ? mb_strtoupper(trim($_POST["numcapitulo"]), 'UTF-8') : null;
 $titulo= isset($_POST["titulo"]) ? mb_strtoupper(trim($_POST["titulo"]), 'UTF-8') : null;  
 $codigoAutor = isset($_POST["autor"]) ? trim($_POST["autor"]) : null;   

 $maxval = $conn->query("SELECT lib_codigo FROM Libro WHERE lib_codigo=(SELECT max(lib_codigo) FROM Libro)");

    while ($row = $maxval->fetch_assoc()) {
        $codigoLibro = $row['lib_codigo'];
    }
    $codigoLibro+=1;
  echo($codigoLibro);

 $sql = "INSERT INTO Libro VALUES ($codigoLibro,'$nombre','$ISBN','$numPaginas')";
 $sql1 = "INSERT INTO Capitulos VALUES (0,'$numCapitulos','$titulo','$codigoLibro','$codigoAutor')";        
    

 if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
 echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>El libro con ese codigo $codigoLibro ya esta registrado en el sistema </p>";
 }else{
 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 }
 }
 //cerrar la base de datos
 $conn->close();
 ?>
</body>
</html>