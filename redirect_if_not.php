<?php
session_start();
ob_start();

if ($_SESSION['active'] !== "true") {
  $_SESSION['error'] = 'please login your account';
  header("Location: login.php");
}
