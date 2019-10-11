<?php
/**
 *   URL:      http://giltesa.com/?p=16650
 *   License:  (CC) BY-NC-SA
 *
 *   Example URL:
 *   http://domain.com/mail.php?key=s7x45IUFBrHHDTw&name=Arduino&from=arduino@domain.com&to=youremail@domain.com&subject=Hello&message=This email was sent from Arduino!
 *
 *   http://domain.com/mail.php
 *    ?key=s7x45IUFBrHHDTw
 *    &name=Arduino
 *    &from=arduino@domain.com
 *    &to=youremail@domain.com
 *    &subject=Hello
 *    &message=This email was sent from Arduino!
 */

    // Authentication key, required to use this service:
    define("KEY", "s7x45IUFBrHHDTw");

    // Possible output responses:
    define("OK",                  "1");
    define("ERROR_AUTENTICATION", "2");
    define("ERROR_PARAMETERS",    "3");
    define("ERROR_SEND_MAIL",     "4");

    // Parameters sent from the Arduino:
    $key     = $_GET['key'];
    $name    = $_GET['name'];
    $from    = $_GET['from'];
    $to      = $_GET['to'];
    $subject = $_GET['subject'];
    $message = $_GET['message'];


    if( !isset($key) || $key !== KEY )
    {
        echo ERROR_AUTENTICATION;
    }
    else if( !isset($name) || !isset($from) || !isset($to) || !isset($subject) || !isset($message) )
    {
        echo ERROR_PARAMETERS;
    }
    else
    {
        echo mail( $to, $subject, $message, "From: $name<$from>\r\nReturn-path: $from" ) ? OK : ERROR_SEND_MAIL;
    }
?>
