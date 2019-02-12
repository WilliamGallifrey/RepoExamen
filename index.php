<?php

$mysqli = new mysqli("localhost", "root", "", "liga");
if ($mysqli->connect_errno) {
    echo "Error de conexión MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT * FROM partido") or die($mysqli->error);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equipos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

<table>
<tr>
    <th>Id_partido</th>
    <th>Local</th>
    <th>Visitante</th>
    <th>Resultado</th>
</tr>

<?php

while ($row = $res->fetch_assoc()) 
{
    $resLoc = $mysqli->query("SELECT nombre_eq FROM equipo WHERE id_equipo = $row[local]") or die($mysqli->error);
    $resVis = $mysqli->query("SELECT nombre_eq FROM equipo WHERE id_equipo = $row[visitante]") or die($mysqli->error);    

    $local = $resLoc->fetch_assoc();
    $vis = $resVis->fetch_assoc();
    
    echo"<tr>";
    echo"<td>$row[id_partido]</td>";
    echo"<td><a href='equipo.php?id=$row[local]'>$local[nombre_eq]</a></td>";
    echo"<td><a href='equipo.php?id=$row[visitante]'>$vis[nombre_eq]</a></td>";
    echo"<td>$row[resultado]</td>";
    echo"</tr>";

}

?>

</table>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


</body>
</html>