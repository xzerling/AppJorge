<?php
header('Content-Type: application/json');
$con = mysqli_connect("citra-test.cmmqgr4kvqxz.us-east-2.rds.amazonaws.com", "admin", "12345678", "citra");
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
} else {
    $data_points = array();
    $result = mysqli_query($con, "SELECT * FROM ns5"); 
    while ($row = mysqli_fetch_array($result)) {
        $point = array("M" => $row['M'],"T" => $row['T'], "H" => $row['H'], "I" => $row['I'], "O" => $row['O']);
        array_push($data_points, $point);
    }
    echo json_encode($data_points);
}
mysqli_close($con);
?>

