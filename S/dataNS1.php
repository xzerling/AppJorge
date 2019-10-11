<?php
header('Content-Type: application/json');
//conexion con la base de datos
$con = mysqli_connect("localhost", "root", "Jorge1995", "db_prueba");
if (mysqli_connect_errno($con)) {
//indica si existe un error al conectar con la base de datos
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
} else {
//crea un arreglo de datos
    $data_points = array();
    //obtiene los datos de la tabla NS1
    $result = mysqli_query($con, "SELECT * FROM NS1"); 
    //mientras exista datos en la tabla
    while ($row = mysqli_fetch_array($result)) {
    //guarda los datos en un arreglo con los nombres M, T, H, I, O
        $point = array("M" => $row['M'],"T" => $row['T'], "H" => $row['H'], "I" => $row['I'], "O" => $row['O']);
        array_push($data_points, $point);
    }
    //transforma los datos a un codigo json
    echo json_encode($data_points);
}
mysqli_close($con);
?>