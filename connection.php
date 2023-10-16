<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "php_crm_dashboard";

$conn = mysqli_connect($host, $user, $password, $db);

if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
