<?php

$id = $_GET['id'];

$mysqli = new mysqli("localhost", "root", "", "liga");
if ($mysqli->connect_errno) {
    echo "Error de conexión MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT * FROM equipo WHERE id_equipo = $id") or die($mysqli->error);
$equipo =  $res->fetch_assoc();


?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo"$equipo[nombre_eq]";?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

<table>
<tr>
    <th>Id_equipo</th>
    <th>Nombre</th>
    <th>Ciudad</th>
    <th>Web</th>
    <th>Puntos</th>
    <th>Ver jugadores</th>
</tr>

<?php

echo"<tr>";
echo"<td>$equipo[id_equipo]</td>";
echo"<td>$equipo[nombre_eq]</td>";
echo"<td>$equipo[ciudad]</td>";
echo"<td>$equipo[web]</td>";
echo"<td>$equipo[puntos]</td>";
echo"<td><a href='jugadores.php?id=$equipo[id_equipo]'>Jugadores</a></td>";
echo"</tr>";


?>

</table>
    
</body>
</html>