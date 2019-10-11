<?php
header('Content-Type: application/json');
$con = mysqli_connect("localhost", "root", "Jorge1995", "db_prueba");
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
} else {
    $data_points = array();
    $result = mysqli_query($con, "SELECT * FROM NS1"); 
    while ($row = mysqli_fetch_array($result)) {
        $point = array("valorx" => $row['temp_rel'], "valory" => $row['hum_rel']);
        array_push($data_points, $point);
    }
    echo json_encode($data_points);
}
mysqli_close($con);
?>