<?php

define("HOST", "localhost"); // The host you want to connect to.
define("USER", "root"); // The database username.
define("PASSWORD", "seshhu"); // The database password. 
define("DATABASE", "msit_admissions"); // The database name.
 

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.
$con=mysqli_connect(HOST,USER,PASSWORD, DATABASE);
?>