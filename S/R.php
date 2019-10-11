<?php
#Datos para inicial la sesion
$db_host = "citra-test.cmmqgr4kvqxz.us-east-2.rds.amazonaws.com";
$db_user = "admin";
$db_password = "12345678";
$db_name = "citra";
$db_connection = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($db_connection,$db_name);

#comprueba el nodo ingresado
$N = $_GET['N'];

#guarda los valores para el NS1
if($N === '1'){


$result = mysqli_query("SELECT * FROM `NS1`", $db_connection);

if (!$db_connection) {
    die('No se ha podido conectar a la base de datos');
}


$M = $_GET['M'];
$T = $_GET['T'];
$H = $_GET['H'];
$I = $_GET['I'];
$O = $_GET['O'];


$query = "INSERT INTO`NS1`(`M`,`T`,`H`,`I`,`O`)VALUES('$M','$T','$H','$I','$O')";
$retry_value = mysqli_query($db_connection,$query);
if (!$retry_value) {
    die('Error: ' . mysqli_error($db_connection));
}
printf('Datos enviados a: NS1');
}

#guarda los valores para el NS2
if($N === '2'){


$result = mysqli_query("SELECT * FROM `NS2`", $db_connection);

if (!$db_connection) {
    die('No se ha podido conectar a la base de datos');
}

$M = $_GET['M'];
$T = $_GET['T'];
$H = $_GET['H'];
$I = $_GET['I'];
$O = $_GET['O'];


$query = "INSERT INTO`NS2`(`M`,`T`,`H`,`I`,`O`)VALUES('$M','$T','$H','$I','$O')";
$retry_value = mysqli_query($db_connection,$query);
if (!$retry_value) {
    die('Error: ' . mysqli_error($db_connection));
}
printf('Datos enviados a: NS2');

}

#guarda los valores para el NS3
if($N === '3'){


$result = mysqli_query("SELECT * FROM `NS3`", $db_connection);
if (!$db_connection) {
    die('No se ha podido conectar a la base de datos');
}

$M = $_GET['M'];
$T = $_GET['T'];
$H = $_GET['H'];
$I = $_GET['I'];
$O = $_GET['O'];


$query = "INSERT INTO`NS3`(`M`,`T`,`H`,`I`,`O`)VALUES('$M','$T','$H','$I','$O')";
$retry_value = mysqli_query($db_connection,$query);
if (!$retry_value) {
    die('Error: ' . mysqli_error($db_connection));
}
printf('Datos enviados a: NS3');
}



#guarda los valores para el NS4
if($N === '4'){


$result = mysqli_query("SELECT * FROM `NS4`", $db_connection);

if (!$db_connection) {
    die('No se ha podido conectar a la base de datos');
}


$M = $_GET['M'];
$T = $_GET['T'];
$H = $_GET['H'];
$I = $_GET['I'];
$O = $_GET['O'];


$query = "INSERT INTO`NS4`(`M`,`T`,`H`,`I`,`O`)VALUES('$M','$T','$H','$I','$O')";
$retry_value = mysqli_query($db_connection,$query);
if (!$retry_value) {
    die('Error: ' . mysqli_error($db_connection));
}
printf('Datos enviados a: NS4');
}



#guarda los valores para el NS5
if($N === '5'){


$result = mysqli_query("SELECT * FROM `NS5`", $db_connection);

if (!$db_connection) {
    die('No se ha podido conectar a la base de datos');
}


$M = $_GET['M'];
$T = $_GET['T'];
$H = $_GET['H'];
$I = $_GET['I'];
$O = $_GET['O'];


$query = "INSERT INTO`NS5`(`M`,`T`,`H`,`I`,`O`)VALUES('$M','$T','$H','$I','$O')";
$retry_value = mysqli_query($db_connection,$query);
if (!$retry_value) {
    die('Error: ' . mysqli_error($db_connection));
}
printf('Datos enviados a: NS5');
}




#guarda los valores para el NS6
if($N === '6'){


$result = mysqli_query("SELECT * FROM `NS6`", $db_connection);

if (!$db_connection) {
    die('No se ha podido conectar a la base de datos');
}


$M = $_GET['M'];
$T = $_GET['T'];
$H = $_GET['H'];
$I = $_GET['I'];
$O = $_GET['O'];


$query = "INSERT INTO`NS6`(`M`,`T`,`H`,`I`,`O`)VALUES('$M','$T','$H','$I','$O')";
$retry_value = mysqli_query($db_connection,$query);
if (!$retry_value) {
    die('Error: ' . mysqli_error($db_connection));
}
printf('Datos enviados a: NS6');
}

#guarda los valores para el NS7
if($N === '7'){


$result = mysqli_query("SELECT * FROM `ns7`", $db_connection);

if (!$db_connection) {
    die('No se ha podido conectar a la base de datos');
}


$M = $_GET['M'];
$T = $_GET['T'];
$H = $_GET['H'];
$I = $_GET['I'];
$O = $_GET['O'];


$query = "INSERT INTO`ns7`(`M`,`T`,`H`,`I`,`O`)VALUES('$M','$T','$H','$I','$O')";
$retry_value = mysqli_query($db_connection,$query);
if (!$retry_value) {
    die('Error: ' . mysqli_error($db_connection));
}
printf('Datos enviados a: NS7');
}


#guarda los valores para el NS8
if($N === '8'){


$result = mysqli_query("SELECT * FROM `ns8`", $db_connection);

if (!$db_connection) {
    die('No se ha podido conectar a la base de datos');
}


$M = $_GET['M'];
$T = $_GET['T'];
$H = $_GET['H'];
$I = $_GET['I'];
$O = $_GET['O'];


$query = "INSERT INTO`ns8`(`M`,`T`,`H`,`I`,`O`)VALUES('$M','$T','$H','$I','$O')";
$retry_value = mysqli_query($db_connection,$query);
if (!$retry_value) {
    die('Error: ' . mysqli_error($db_connection));
}
printf('Datos enviados a: NS8');
}


mysqli_close($db_connection);
?>
