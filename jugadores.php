<?php

$mysqli = new mysqli("localhost", "root", "", "liga");
if ($mysqli->connect_errno) {
    echo "Error de conexión MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$id = $_GET['id'];

$res = $mysqli->query("SELECT nombre_eq FROM equipo WHERE  id_equipo = $id  ") or die($mysqli->error);
$equipo = $res->fetch_assoc();


$res2 = $mysqli->query("SELECT * FROM jugador WHERE equipo = $id ") or die($mysqli->error);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jugadores de <?php echo"$equipo[nombre_eq]";?> </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/negrita.css">
</head>
<body>

<table>
<tr>
    <th>Id_jugador</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Posición</th>
    <th>Id_capitán</th>
    <th>Fecha de alta</th>
    <th>Salario</th>
    <th>Equipo</th>
    <th>Altura</th>
</tr>

<?php



while ($row = $res2->fetch_assoc()) 
{ 
    if($row['posicion'] == "Base")
    echo"<tr class ='negrita'>";
    else
    echo"<tr>";
    echo"<td>$row[id_jugador]</td>";
    echo"<td>$row[nombre]</td>";
    echo"<td>$row[apellido]</td>";
    echo"<td>$row[posicion]</td>";
    echo"<td>$row[id_capitan]</td>";
    echo"<td>$row[fecha_alta]</td>";
    echo"<td>$row[salario]</td>";
    echo"<td>$row[equipo]</td>";
    echo"<td>$row[altura]</td>";    
    echo"</tr>";


}

?>

</table>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


</body>
</html>