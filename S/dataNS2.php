<?php
header('Content-Type: application/json');
$con = mysqli_connect("localhost", "root", "Jorge1995", "db_prueba");
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
} else {
    $data_points = array();
    $result = mysqli_query($con, "SELECT * FROM NS2"); 
    while ($row = mysqli_fetch_array($result)) {
        $point = array("M" => $row['M'],"T" => $row['T'], "H" => $row['H'], "I" => $row['I'], "O" => $row['O']);
        array_push($data_points, $point);
    }
    echo json_encode($data_points);
}
mysqli_close($con);
?>