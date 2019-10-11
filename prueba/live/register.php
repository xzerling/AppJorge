<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "Jorge1995";
$db_name = "panamahitek";
$db_table_name = "plot_values";
$db_connection = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($db_connection,$db_name);
$result = mysqli_query("SELECT * FROM $db_table_name", $db_connection);
if (!$db_connection) {
    die('No se ha podido conectar a la base de datos');
}
$x = $_GET['x'];
$y = $_GET['y'];
$query = 'INSERT INTO `' . $db_name . '`.`' . $db_table_name .
        '` (`x` ,'
        . ' `y`) '
        . 'VALUES("' . $x . '",'
        . ' "' . $y . '")';
$retry_value = mysqli_query($db_connection, $query);
if (!$retry_value) {
    die('Error: ' . mysqli_error($db_connection));
}
mysqli_close($db_connection);
?>