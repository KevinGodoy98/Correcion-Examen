<?php
 //incluir conexión a la base de datos
 include 'ConexionBD.php';
 $autor = $_GET['BuscarParametro'];
 $capitulo = $_GET['BuscarParametro'];
 //echo "Hola " . $cedula;

 $sql = "SELECT l.lib_nombre,l.lib_num_paginas,c.cap_numero,c.cap_titulo,a.aut_nombre,a.aut_nacionalidad
         from Libro l, Capitulos c, Autor a
         where l.lib_codigo=c.cap_lib_codigo And c.cap_aut_codigo=a.aut_codigo
         AND a.aut_nombre = '$autor'";

$sql1 = "SELECT l.lib_nombre,l.lib_num_paginas,c.cap_numero,c.cap_titulo,a.aut_nombre,a.aut_nacionalidad
         from Libro l, Capitulos c, Autor a
         where l.lib_codigo=c.cap_lib_codigo And c.cap_aut_codigo=a.aut_codigo
         AND c.cap_titulo = '$capitulo'";

//cambiar la consulta para puede buscar por ocurrencias de letras
 $result =$conn->query($sql);
 $result1 =$conn->query($sql1);
 echo " <table style='width:100%'>
 <tr>
 <th>Libro</th>
 <th>Paginas</th>
 <th>Capitulo</th>
 <th>Titulo</th>
 <th>Autor</th>
 <th>Nacionalidad Autor</th>
 </tr>";

 if ($result->num_rows > 0 ) {

    while($row = $result->fetch_assoc()) {
    echo "<tr>";
   
    echo " <td style=text-align:center>" . $row['lib_nombre'] ."</td>";
    
    echo " <td style=text-align:center>" . $row['lib_num_paginas'] . "</td>";
    
    echo " <td style=text-align:center>" . $row['cap_numero'] . "</td>" ;"<br>";
    
    echo " <td style=text-align:center>" . $row['cap_titulo'] . "</td>" ;"<br>";

    echo " <td style=text-align:center>" . $row['aut_nombre'] . "</td>" ;"<br>";

    echo " <td style=text-align:center>" . $row['aut_nacionalidad'] . "</td>" ;"<br>";
    
    echo "</tr>";
    }
 } else {
   if ($result1->num_rows > 0 ){
    while($row1 = $result1->fetch_assoc()) {
        echo "<tr>";
       
        echo " <td style=text-align:center>" . $row1['lib_nombre'] ."</td>";
    
        echo " <td style=text-align:center>" . $row1['lib_num_paginas'] . "</td>";
    
        echo " <td style=text-align:center>" . $row1['cap_numero'] . "</td>" ;"<br>";
    
        echo " <td style=text-align:center>" . $row1['cap_titulo'] . "</td>" ;"<br>";

        echo " <td style=text-align:center>" . $row1['aut_nombre'] . "</td>" ;"<br>";

        echo " <td style=text-align:center>" . $row1['aut_nacionalidad'] . "</td>" ;"<br>";
        
        echo "</tr>";
        }
   }else{
    echo "<tr>";
    echo " <td colspan='7'> No existen esos registros en el sistema </td>";
    echo "</tr>";
 }
 }
 echo "</table>";
 $conn->close();

?>